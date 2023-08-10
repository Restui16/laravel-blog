@foreach ($categories as $category)
<div class="modal fade" id="modalDelete{{$category->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <form action="{{ url('categories/'. $category->id) }}" method="post">
                @method('delete')
                @csrf
                <h4 class="text-capitalize mb-5"> Are you sure want delete category <b>"{{ $category->name}}"</b></h4>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                
            </form>
        </div>
        
      </div>
    </div>
</div>
@endforeach