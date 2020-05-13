<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('/order/1') }}">
                <input type="hidden" name="_method" value="PUT">
                @csrf
            <fieldset>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="full_name">Full Name</label>
                            <input class="form-control" id="Efull_name" name="full_name" required type="text" />
                        </div>
                    </div>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="Phone">Phone</label>
                            <input class="form-control" id="Ephone" name="phone" required type="text" />
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="city">City</label>
                            <input class="form-control" id="Ecity" name="city" required type="text" />
                        </div>
                    </div>
                    <div class='col-sm-6'>
                        <div class='form-group'>
                            <label for="country">country</label>
                            <input class="form-control" id="Ecountry" name="country" required type="text" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="adress">Adress</label>
                            <textarea name="adress"  class="form-control" id="Eadress" required cols="30" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="product">product</label>

                            <select class="form-control" multiple="multiple" id="myselect" name="products[]">
                                <option value=""></option>
                                @foreach ($product as $item)
                                <option value="{{ $item->id }}">{{ $item->brand.' '.$item->name.' '.$item->price.' $' }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="qte">Qte</label>

                                <input type="number" class="form-control" name="qte" id="">
                        </div>
                    </div>
                </div>                
            </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">save order</button>
        </div>
    </form>
      </div>
    </div>
  </div>
