@extends('Layout.app')
@section('package')
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter categorie</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{route('add-categorie')}}" method="POST">
                <div class="form-group">
                  <label for="titre" class="col-form-label">Titre:</label>
                  <input type="text" name="libelle" class="form-control" id="titre">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter Categorie</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
            </div>
          </div>
      </div>
        </div>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Order</th>
                <th>Libelle</th>
                <th>Amount</th>
                <th style="text-align:center;width:100px;">Add row <button type="button"  class="btn btn-success btn-xs dt-add" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($categories as $item)
            <tr>
                <td>{{$loop->index}}</td>
                <td>{{$item->libelle}}</td>
                
                <td>
                    <button type="button" class="btn btn-primary btn-xs dt-edit"  data-toggle="modal" data-target="#edit{{$item->id}}" data-whatever="@mdo" style="margin-right:16px;">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs dt-delete" data-toggle="modal" data-target="#delete{{$item->id}}" data-whatever="@mdo">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>

            <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier categorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('edit-categorie', $item->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <label for="titre" class="col-form-label">Titre:</label>
                        <input type="text" name="libelle" class="form-control" id="titre" value="{{$item->libelle}}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Edit Categorie" >
                    </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                    </div>
                </div>
                </div>
            </div>
            <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer categorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <p>Confirmer la suppression</p>
                    </div>
                    <div class="modal-footer">
                     <form action="{{route('delete-categorie', $item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-primary" value="Oui" >
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                    </div>
                </div>
                </div>
            </div>
          @endforeach 
         
        </tbody>
    </table>
    
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Row information</h4>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
    </div>    
@endsection