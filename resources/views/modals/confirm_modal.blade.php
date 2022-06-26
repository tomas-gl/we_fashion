<!-- Modal -->
<div class="modal fade" @if(isset($product)) id="confirmModal{{$product->id}}" @else id="confirmModal{{$category->id}}" @endif tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Suppression @if(isset($product)) d'un produit @else d'un article @endif</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Confirmer la suppression ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <form 
            action="@if(isset($product)){{ route('products.destroy', $product->id) }}@else{{ route('categories.destroy', $category->id) }}@endif" 
            method="post">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-primary">Confirmer</button>
          </form>
        </div>
      </div>
    </div>
  </div>