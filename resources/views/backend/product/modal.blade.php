<!-- Modal -->
<div class="modal fade" id="exampleModal{{$productColor->color->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel">{{$productColor->color->name}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="{{route('product.updateProdColorQty',$productColor->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <input type="number" value="{{$productColor->Color_quantity}}" name="Color_quantity" class="form-control form-control-sm">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm text-white" data-bs-dismiss="modal">Close</button>
                <button type="submit"  class=" btn btn-primary btn-sm text-white">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>


{{-- Modal finish--}}
