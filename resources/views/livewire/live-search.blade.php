<div>
    {{-- The Master doesn't talk, he acts. --}} 
    {{$name}}
    <div class="input-group">
        <input type="text" wire:model="name" autocomplete="off" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-dark" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
    </div>

    
</div>
