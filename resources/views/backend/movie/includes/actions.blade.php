@if ($logged_in_user->hasAllAccess())
<x-utils.view-button :href="route('admin.auth.movie.show', $user)" />
<x-utils.edit-button :href="route('admin.auth.movie.edit', $user)" />
<x-utils.delete-button :href="route('admin.auth.movie.destroy', $user)" />
@endif

