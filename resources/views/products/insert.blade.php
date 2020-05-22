<div class="modal fade" id="addModal"  style="overflow:hidden;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
    
    <div class="modal-dialog" role="document">


        <div class="modal-content">


            <!-- == Modal Header == --> 
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Add new Order</h5>
            
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>


            <!-- == Modal Body == --> 

            <form method="POST" action="`" id="form-insert">

                <div class="modal-body">

                    

                    <fieldset>

                        <div class='row'>

                            <div class='col-sm-6'>

                                <div class='form-group'>
                                    <label for="full_name">Name</label>
                                    <input class="form-control" id="full_name" required name="name"  type="text" />
                                </div>

                            </div>

                            <div class='col-sm-6'>

                                <div class='form-group'>
                                    <label for="Brand">Brand</label>
                                    <input class="form-control" id="brand" name="brand" required type="text" />
                                </div>
                            </div>

                        </div>


                        <div class='row'>

                            <div class='col-sm-6'>

                                <div class='form-group'>
                                    <label for="city">Price</label>
                                    <input class="form-control" id="price" name="price" required type="number"  min="1"/>
                                </div>

                            </div>

                            <div class='col-sm-6'>

                                <div class='form-group'>
                                    <label for="Qte">Qte</label>
                                    <input class="form-control" id="Qte" name="Qte" required type="number" min="1" />
                                </div>

                            </div>

                        </div>


                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description"  class="form-control" id="description" required cols="30" rows="4"></textarea>
                                </div>
                            </div>

                        </div>

                    </fieldset>
                
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-confirm-insert">make order</button>
                </div>

            </form>
        
        </div>


    </div>


</div>

