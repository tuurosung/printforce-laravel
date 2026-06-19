<form id="filterFrm">

                <div class="d-flex mb-5">
                    <div class="mb-3 me-3">
                        <label for="" class="form-label">Start Date</label>
                        <input
                            type="text"
                            class="form-control
                            name="start_date"
                            id="start_date"
                            value="{{ now()->format('Y-m-d') }}"
                            required />
                    </div>
                    <div class="mb-3 me-3">
                        <label for="" class="form-label">End Date</label>
                        <input
                            type="text"
                            class="form-control
                            name="end_date"
                            id="end_date"
                            value="{{ now()->format('Y-m-d') }}"
                            required />
                    </div>
                    <div class="form-group" style="padding-top: 27px;">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search me-3"></i> Filter Transfers</button>
                    </div>
                </div>

            </form>
