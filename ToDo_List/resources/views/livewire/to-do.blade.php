<div>
    <div class="container content py-6 mx-auto">
        @include('livewire.includes.create-todo-box')
        @include('livewire.includes.search-box')
    
    <div id="todos-list">
        @foreach($todos as $todo)
        @include('livewire.includes.todo-card')
        @endforeach
        <div class="my-2">
            {{$todos->links()}}
        </div>
    
</div>
