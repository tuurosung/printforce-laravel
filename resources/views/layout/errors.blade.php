@if ($errors->any())
<div class="bg-lighterror border border-lighterror text-sm text-erroremphasis rounded-md p-4 dark:bg-darkerror dark:border-darkerror dark:text-error mb-5" role="alert">
    <ul class="list-group">
        @foreach ($errors->all() as $error)
        <li class="list-group-item bg-none border-0">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
