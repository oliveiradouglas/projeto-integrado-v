@extends('layouts.app')

@section('content')
<div class="container">

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

                                    <a href="#" class="btn btn-sm btn-success" title="Finalizar serviço">
                                        <span class="glyphicon glyphicon-ok"></span>
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
</div>
@endsection
