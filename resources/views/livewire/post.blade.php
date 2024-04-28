<div>
    <div class="col-md-8 mb-2">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif                
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
        @if($Postadd)
            @include('livewire.create')
        @endif            
        @if($updatePost)
            @include('livewire.update')
        @endif
    </div>    
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @if(!$Postadd)
                <button wire:click="addPost()" class="btn btn-primary btn-sm float-right">Add New Post</button>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($posts) > 0)
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            {{$post->title}}
                                        </td>
                                        <td>
                                            {{$post->description}}
                                        </td>
                                        <td>
                                            <button wire:click="editPost({{$post->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deletePost({{$post->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach$addPost
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No Posts Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
    <script>
        function deletePost(id){
            console.log(id)
            if(confirm("Are you sure to delete this record?"))
            this.dispatch('deletePost',id);
        }
        function addPost(){
            console.log('addPost');
        }

    </script>
    <script>
          document.addEventListener('livewire:load', () => {
        Livewire.on('jscjsnc', (data) => {
            console.log('i am a live wire');
        });
 
        // Calling "cleanup()" will un-register the above event listener...
        cleanup();
    });
    </script>
</div>