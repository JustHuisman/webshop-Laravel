<form wire:submit.prevent="save">
    <input type="file" wire:model="image">
 
    @error('image') <span class="error">{{ $message }}</span> @enderror

</form>
