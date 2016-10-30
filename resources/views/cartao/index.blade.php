@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-row row">
        <div class="col-md-8 col-md-offset-2">
            <a href="#" class="btn btn-success"> 
                <span class="glyphicon glyphicon-plus"></span>
                Novo cartão
            </a>
        </div>
    </div>

    <div class="form-row row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cartões</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Nome impresso</th>
                                <th>Bandeira</th>
                                <th>Vencimento</th>
                                <th>CVV</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="text-center">
                                <td>4024007145349394</td>
                                <td>FULANO TESTE</td>
                                <td>Visa</td>
                                <td>03/2018</td>
                                <td>516</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-default" title="Editar cartão">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger" title="Excluir cartão">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td>5225384904506975</td>
                                <td>FULANO TESTE</td>
                                <td>MasterCard</td>
                                <td>04/2018</td>
                                <td>123</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-default" title="Editar cartão">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger" title="Excluir cartão">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <a href="#" class="pull-right"> Voltar</a>
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
