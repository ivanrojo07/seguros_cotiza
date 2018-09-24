<!--PASO 4-->
<div class="tab-pane fade" id="paso4" role="tabpane4" aria-labelledby="paso4-tab">

    <div class="row m-3">

        <div class="col col-sm-6 offset-sm-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Forma de pago</label>
                </div>
                <select class="custom-select" id="metododepago">
                    <option selected>elegir...</option>
                    <option value="1">Efectivo</option>
                    <option value="2">Tarjeta</option>
                    <option value="3">Transferencia</option>
                </select>
            </div>
        </div>

    </div>

    <!--EFECTIVO-->
    <div id="metodo1" class="row m-3 metodo" style="display: none;">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Pago en efectivo
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label for="banco">Banco:</label>
                                <input type="text" class="form-control" id="banco">
                            </div>
                        </div>
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label for="referencia">Transferencia:</label>
                                <input type="text" class="form-control" id="referencia">
                            </div>
                        </div>
                    </div>
                    <div class="col-2 offset-5">
                        <a href="#" class="btn btn-primary">Contratar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--TARJETAS1-->
    <div id="metodo2" class="row m-3 metodo" style="display: none;">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Pago con tarjeta
                    <i class="fa fa-credit-card" style="font-size:24px"></i>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label for="banco">Banco:</label>
                                <input type="text" class="form-control" id="banco">
                            </div>
                        </div>
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label for="referencia">Titular:</label>
                                <input type="text" class="form-control" id="referencia">
                            </div>
                        </div>
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label for="referencia">No. tarjeta</label>
                                <input type="text" class="form-control" id="referencia">
                            </div>
                        </div>
                        <div class="col-2 offset-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Mes</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Año</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                                <option>2026</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="referencia">CVC</label>
                                <input type="text" class="form-control" id="referencia">
                            </div>
                        </div>
                    </div>
                    <div class="col-2 offset-5">
                        <a href="#" class="btn btn-primary">Contratar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--TRANSFERENCIA-->
    <div id="metodo3" class="row m-3 metodo" style="display: none;">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Pago en efectivo
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label for="cuenta">No. Cuenta:</label>
                                <input type="text" class="form-control" id="cuenta">
                            </div>
                        </div>
                        <div class="col-6 offset-3">
                            <div class="form-group">
                                <label for="referencia">No. Referencia:</label>
                                <input type="text" class="form-control" id="referencia">
                            </div>
                        </div>
                    </div>
                    <div class="col-2 offset-5">
                        <a href="#" class="btn btn-primary">Contratar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>