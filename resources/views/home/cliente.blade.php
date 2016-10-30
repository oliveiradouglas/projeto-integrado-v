@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-row row">
        <div class="col-md-8 col-md-offset-2">
            <a href="#" class="btn btn-success"> 
                <span class="glyphicon glyphicon-plus"></span>
                Novo serviço
            </a>

            <a href="#" class="btn btn-primary marginL10"> 
                <span class="glyphicon glyphicon-credit-card"></span>
                Cartões
            </a>
        </div>
    </div>

    <div class="form-row row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Serviços</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Preço</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="text-center">
                                <td>3</td>
                                <td>30/10/2016</td>
                                <td>R$ 15,00</td>
                                <td>
                                    <span class="label label-warning">Em andamento</span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-default" title="Visualizar serviço">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>2</td>
                                <td>28/10/2016</td>
                                <td>R$ 18,92</td>
                                <td>
                                    <span class="label label-success">Finalizado</span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-default" title="Visualizar serviço">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-primary" title="Avaliar motoboy" data-toggle="modal" data-target="#modal-avaliacao">
                                        <span class='glyphicon glyphicon-star'></span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>1</td>
                                <td>17/10/2016</td>
                                <td>R$ 29,00</td>
                                <td>
                                    <span class="label label-success">Finalizado</span>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-default" title="Visualizar serviço">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-avaliacao">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Avaliar motoboy</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-4">
                            Nota do serviço
                        </label>

                        <div class="col-md-6">
                            <input type="radio" name="nota" value="1" /> 1
                            <input type="radio" name="nota" value="2" /> 2
                            <input type="radio" name="nota" value="3" /> 3
                            <input type="radio" name="nota" value="4" /> 4
                            <input type="radio" name="nota" value="5" checked /> 5
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
