# PrintForce — Print Shop Management SaaS

A subscription-based, multi-tenant print shop management platform built with Laravel 13. PrintForce gives print and promotional goods businesses a unified system to manage print jobs across multiple departments, handle customer invoicing and payments, track supplier procurement, and monitor financial accounts — all scoped per subscriber with enforced role-based access.

---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Architecture](#architecture)
- [Tech Stack](#tech-stack)
- [Database Schema](#database-schema)
- [Multi-Tenancy Model](#multi-tenancy-model)
- [Subscription Lifecycle](#subscription-lifecycle)
- [Role-Based Access Control](#role-based-access-control)
- [Getting Started](#getting-started)
- [Project Structure](#project-structure)
- [Design Decisions](#design-decisions)

---

## Overview

PrintForce is designed for print shop owners and managers who need to coordinate multiple production departments — large format, press, embroidery, design, DTF, sublimation, and photography — under one roof. The application is built as a SaaS product with a full subscriber registration and trial flow, subscription expiration enforcement, and tenant-isolated data at every layer.

The codebase follows Domain-Driven Design principles with a strict Repository + Service layer separation. Each business domain owns its controllers, requests, models, repositories, services, and contracts. Nothing bleeds across domain boundaries via direct model access — everything routes through interfaces bound in the IoC container.

---

## Features

### Print Job Management
- Polymorphic job model (`PrintforceJob`) linking to six specialized job types: Large Format, Press, Embroidery, Design, Photography, and DTF/Sublimation
- Job status lifecycle: `pending → in_progress → completed | on_hold | cancelled`
- Job assignment to specific staff members by role
- Today's Jobs view for daily production tracking
- Per-job notes and deadline tracking

### Customer Relationship Management
- Full customer lifecycle with categories and classification
- Debtor tracking with balance calculations (debit vs. credit)
- Customer-level invoice history and payment records
- Computed balance attributes via `HasBalance` trait

### Invoicing
- Invoice creation with line items tied to defined print services
- Invoice statuses: `draft → pending → active | cancelled`
- Invoice type classification via enum
- Soft deletes for full audit trail

### Payments
- Customer payment recording with account routing
- Payment alert notifications system
- Payment date tracking and financial statistics

### Supplier & Procurement
- Supplier management with running balance (purchases minus payments)
- Purchase order creation with line items
- Supplier payment tracking separate from customer payments

### Financial Accounting
- Operating accounts (bank, mobile money, cash, etc.)
- Fund transfers between accounts
- Expenditure tracking with categorised headers
- Deposit (add funds) recording per account

### Subscription Management
- Self-service subscriber registration with trial plan (14-day)
- Subscription expiration validation enforced at middleware level
- Days-remaining calculation and user-facing display
- Plan upgrade flow

---

## Architecture

### Domain-Driven Design

Each major feature lives in its own domain directory:

```
app/Domain/
├── Customers/
│   ├── Http/Controllers/
│   ├── Http/Requests/
│   ├── Models/
│   ├── Repositories/
│   ├── Services/
│   └── Contracts/
├── Invoices/
├── Payments/
├── PrintJobs/
├── PrintServices/
├── Purchases/
└── Suppliers/
```

Controllers are thin — they validate input via Form Requests, pass data to a Service, and return a response. Business logic lives exclusively in the Service layer. Database queries are delegated entirely to Repositories.

### Repository Pattern

Every domain defines an interface in its `Contracts/` directory:

```php
interface InvoiceRepositoryInterface
{
    public function find(string $id): CustomerInvoice;
    public function forCustomer(string $customerId): Collection;
    public function activeInvoices(): Collection;
    // ...
}
```

Concrete implementations are bound in `BindContractServiceProvider`:

```php
$this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
$this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
$this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
// ...
```

Swapping implementations requires no changes to controllers or services.

### Service Layer

Services handle all business logic and orchestrate repositories. They're injected into controllers via the container:

```php
class InvoiceController extends Controller
{
    public function __construct(
        private readonly InvoiceRepositoryInterface $invoices,
        private readonly InvoiceService $service,
    ) {}
}
```

Atomic operations (invoice deletion cascades, subscriber registration) are wrapped in database transactions at the service layer, never in controllers.

### Traits for Cross-Cutting Concerns

| Trait | Purpose |
|-------|---------|
| `ScopedToSubscriber` | Auto-applies `subscriber_id` filter to all queries |
| `Cacheable` | Generates tenant-scoped cache keys (`{subscriber_id}__{key}`) |
| `HasBalance` | Computed debit/credit/balance attributes on Customer |
| `HasInvoices` | Invoice relationship loading |
| `HasPayments` | Payment relationship loading |
| `HasJobs` | Job relationship loading |
| `HasArrayCollections` | Array/collection manipulation helpers in Services |

### Type Safety

- PHP 8.3 enums for all status and type fields: `InvoiceStatusEnum`, `InvoiceTypeEnum`, `CustomerCategoryEnum`, `ServiceCategoryEnum`
- Spatie Data objects (`CustomerData`, `SubscriberData`, `PaymentData`) for typed data transfer between layers
- Custom Eloquent cast (`MoneyFormat`) for consistent currency handling
- Computed model attributes using `Attribute` for consistent presentation logic

---

## Tech Stack

### Backend

| Package | Version | Purpose |
|---------|---------|---------|
| PHP | ^8.3 | Runtime |
| Laravel | ^13.0 | Framework |
| Livewire | ^4.3 | Reactive UI components |
| Laravel Pulse | ^1.4 | Real-time server monitoring |
| Spatie Data | ^4.23 | Type-safe DTOs and validation |
| Typesense | ^5.1 | Full-text search |
| Resend | ^1.0 | Transactional email |
| Laravel ReCaptcha v3 | ^1.0 | Bot protection on auth forms |

### Frontend

| Package | Version | Purpose |
|---------|---------|---------|
| Vite | ^8.0 | Asset bundling |
| Tailwind CSS | ^4.3 | Utility-first styling |
| Bootstrap | ^5.3 | Component framework |
| Preline | ^4.2 | UI component library |
| ApexCharts | ^5.3 | Financial and analytics charts |
| DataTables | ^2.3 | Interactive data tables |
| SweetAlert2 | ^11.26 | Confirmation dialogs and alerts |
| jQuery | ^3.7 | DOM utilities |
| Vanilla Calendar Pro | ^3.1 | Date picker |

### Development

| Tool | Purpose |
|------|---------|
| Laravel Pint | Code style enforcement |
| Laravel Debugbar | Query and performance inspection |
| Laravel IDE Helper | PHPDoc generation for IDE support |
| PHPUnit ^12 | Unit and feature testing |
| Mockery | Mocking in tests |
| Spatie Ignition | Enhanced error pages |
| Laravel Sail | Docker-based local development |

---

## Database Schema

### Core Entities

| Table | Key Fields |
|-------|-----------|
| `users` | `user_id`, `subscriber_id`, `name`, `email`, `access_level`, `phone_number` |
| `subscriptions` | `subscriber_id`, `company_name`, `plan_id`, `status`, `start_date`, `end_date`, `next_payment_date` |
| `customers` | `customer_id`, `subscriber_id`, `name`, `phone`, `category` |
| `invoices` | `invoice_id`, `subscriber_id`, `customer_id`, `invoice_type`, `status`, `sub_total`, `total`, `paid_at` |
| `invoice_items` | `item_id`, `invoice_id`, `service_id`, `quantity`, `unit_price`, `total` |
| `payments` | `payment_id`, `subscriber_id`, `customer_id`, `amount_paid`, `account_number`, `payment_date` |
| `printforce_jobs` | `id`, `subscriber_id`, `job_type`, `jobable_id`, `jobable_type`, `customer_id`, `service_id`, `job_status`, `assigned_to` |
| `jobs_large_format` | `id`, `job_id` + large format specific fields |
| `jobs_press` | `id`, `job_id` + press specific fields |
| `jobs_embroidery` | `id`, `job_id` + embroidery specific fields |
| `jobs_design` | `id`, `job_id` + design specific fields |
| `jobs_photography` | `id`, `job_id` + photography specific fields |
| `services` | `id`, `subscriber_id`, `service_name`, `category_id`, pricing fields |
| `operating_accounts` | `account_number`, `subscriber_id`, `account_name`, `account_type_id`, `balance` |
| `expenditures` | `id`, `subscriber_id`, `header_id`, `description`, `amount`, `date` |
| `fund_transfers` | `id`, `from_account`, `to_account`, `amount`, `transfer_date` |
| `suppliers` | `supplier_id`, `subscriber_id`, `supplier_name`, `supplier_phone` |
| `purchases` | `purchase_id`, `supplier_id`, `purchase_date` |
| `purchase_payments` | `id`, `supplier_id`, `amount_paid`, `payment_date` |

### Polymorphic Job Model

`PrintforceJob` uses Laravel's polymorphic relationships to link a single parent job record to type-specific child records:

```
printforce_jobs (jobable_type = "DesignJob", jobable_id = 42)
    └── jobs_design (id = 42)
```

Adding a new job type requires a new model, migration, and morph registration — no changes to existing job infrastructure.

---

## Multi-Tenancy Model

PrintForce uses a **shared database, shared schema** multi-tenancy model with `subscriber_id` as the tenant key on every business table.

Tenant isolation is enforced at the Eloquent level via a global model scope:

```php
class SubscriberScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('subscriber_id', Auth::user()->subscriber_id);
    }
}
```

The `ScopedToSubscriber` trait applies this scope automatically. No query in the application can accidentally return another subscriber's data — the filter is at the ORM layer, not the controller layer.

Cache keys are also scoped per tenant via the `Cacheable` trait:

```php
protected function cacheKey(string $key): string
{
    return Auth::user()->subscriber_id . '__' . $key;
}
```

---

## Subscription Lifecycle

```
Registration → Trial (14 days) → Active (paid) → Expired
```

1. **Registration** — `RegisterSubscriberController` creates the subscriber and first user, assigns a trial plan, sets `end_date` and `next_payment_date`
2. **Active** — All authenticated routes pass through `CheckSubscriptionValidatity` middleware which checks `Auth::user()->company->isExpired()`
3. **Expired** — Middleware redirects to `/subscription` for plan renewal. The application is completely inaccessible until renewed.
4. **Helpers** on the `Subscribers` model:
   - `isExpired()` — compares `next_payment_date` against today
   - `daysRemaining()` — integer days until expiration
   - `displayDaysRemaining()` — formatted user-facing message

---

## Role-Based Access Control

Eight access levels are defined, each corresponding to a department role:

| Level | Role |
|-------|------|
| 1 | Administrator |
| 2 | Manager |
| 3 | Receptionist |
| 4 | Large Format Technician |
| 5 | Print Technician |
| 6 | Graphic Designer |
| 7 | DTF Technician |
| 8 | Sublimation Technician |

Role checks are available as named helpers on the User model (`isAdministrator()`, `isPrintTechnician()`, etc.) and enforced through Laravel Gates registered in `AppServiceProvider`. Sidebar navigation is role-aware — each role gets a scoped sidebar with only the routes relevant to their function.

---

## Getting Started

### Requirements

- PHP 8.3+
- Composer
- Node.js 20+
- SQLite or MySQL/PostgreSQL

### Installation

```bash
git clone https://github.com/your-username/printforce-laravel.git
cd printforce-laravel

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate --seed
npm run build
php artisan serve
```

### Development

```bash
# Run all dev processes concurrently (server, queue, logs, vite)
npm run dev
```

This project uses Laravel Sail for Docker-based development:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate --seed
```

---

## Project Structure

```
app/
├── Console/Commands/         # Artisan commands (including Healers/)
├── Data/                     # Spatie Data DTOs
├── Domain/                   # Feature domains (DDD)
│   ├── Customers/
│   ├── Invoices/
│   ├── Payments/
│   ├── PrintJobs/
│   ├── PrintServices/
│   ├── Purchases/
│   └── Suppliers/
├── Exceptions/               # Custom application exceptions
├── Helpers/                  # Global helper functions
├── Http/
│   ├── Controllers/          # Non-domain controllers (Auth, Dashboard, Accounting)
│   ├── Middleware/
│   └── Requests/
├── Models/                   # Shared/cross-domain models
│   ├── Accounting/
│   ├── Jobs/
│   └── Scopes/
├── Notifications/            # Laravel notification classes
├── Providers/                # Service providers and IoC bindings
├── Services/                 # Shared services (BaseService, DebtorService)
├── Traits/                   # Cross-cutting traits
└── View/Components/          # Blade components

routes/
└── app-routes/               # Domain-split route files

resources/
├── views/
│   ├── layout/               # App shells, sidebars, nav
│   ├── auth/                 # Login, registration, expired views
│   └── app/                  # Domain-specific views
├── css/                      # Tailwind and custom stylesheets
└── js/                       # Module-split JavaScript
```

---

## Design Decisions

**Why Repository Pattern over direct Eloquent in controllers?**
Repository interfaces make the query layer testable and swappable. When query requirements evolve (e.g., adding Typesense-backed search), only the repository implementation changes — nothing above it.

**Why shared-schema multi-tenancy instead of separate databases per tenant?**
At the target scale of this product (small-to-medium print shops), per-tenant database provisioning adds operational overhead that isn't justified. The `SubscriberScope` approach keeps the infrastructure simple while providing reliable isolation at the application layer.

**Why a polymorphic job model?**
Print jobs have meaningfully different fields depending on type — a large format job tracks media type and finishing, an embroidery job tracks stitch count and thread colours. A single `jobs` table with nullable columns for every possible field would be unmanageable. Polymorphism lets each job type own its schema while sharing the common job lifecycle (status, assignment, dates) in the parent record.

**Why both Tailwind CSS and Bootstrap?**
Bootstrap handles complex interactive components (modals, dropdowns, tabs) where its JavaScript behaviour is already well-tested. Tailwind handles layout, spacing, and custom UI that would require overriding Bootstrap styles. They coexist without conflict at the build level.

---

## Author

Built by a senior Laravel developer focused on SaaS architecture, domain-driven design, and scalable multi-tenant applications.

---

## License

Private. All rights reserved.
