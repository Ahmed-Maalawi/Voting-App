@can('update', $idea)idea
<livewire:edit-idea :idea="$idea" />
@endcan

@can('delete', $idea)
    <livewire:delete-idea :idea="$idea" />
@endcan

@auth
<livewire:mark-idea-as-spam :idea="$idea" />
@endauth


@admin
<livewire:mark-idea-not-spam :idea="$idea" />
@endadmin

@auth
<livewire:edit-comment />
@endauth

@auth
    <livewire:delete-comment />
@endauth
