@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/sweetalert.css') }}" />

<div class="container">
    <div class="form-row row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li><a href="{{ action('ServicoController@index') }}">Serviços</a></li>
                <li class="active">Novo serviço</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Solicitar serviço</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="formulario" role="form" method="POST" action="{{ url('/servico/adicionar') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="id_motoboy" class="col-md-4 control-label">Motoboy</label>

                            <div class="col-md-6">
                                <input id="nome_motoboy" type="text" class="form-control" disabled />
                                <input id="id_motoboy" type="hidden" name="id_motoboy" required />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="endereco_origem" class="col-md-4 control-label">Endereço de origem</label>

                            <div class="col-md-6">
                                <input id="endereco_origem" type="text" class="form-control" name="endereco_origem" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="endereco_destino" class="col-md-4 control-label">Endereço de destino</label>

                            <div class="col-md-6">
                                <input id="endereco_destino" type="text" class="form-control" name="endereco_destino" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="preco" class="col-md-4 control-label">Preço R$</label>

                            <div class="col-md-6">
                                <input id="preco" type="text" class="form-control" name="preco" required readonly value="0,00" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="observacoes" class="col-md-4 control-label">Descrição</label>

                            <div class="col-md-6">
                                <textarea id="observacoes" rows="4" class="form-control" name="observacoes" required ></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="observacoes" class="col-md-4 control-label">Cartão</label>

                            <div class="col-md-6">
                                @forelse ($cartoes as $indice => $cartao)
                                    <input type="radio" name="id_cartao" value="{{ $cartao->id }}" required {{ $indice == 0 ? 'checked' : ''}} /> Final: {{ $cartao->getFinalCartao() }}, Bandeira: {{ $cartao->bandeira }} <br />
                                @empty
                                    Nenhum cartão cadastrado!
                                @endforelse
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="#" class="btn btn-danger">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-success" id="btn-solicitar">
                                    Solicitar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/number_format.js') }}" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyDgKvor_-I01kUNPwAXNgiu-wKhB7reFbU"></script>
<script type="text/javascript">
    $('#endereco_origem').focusout(function(){
        if ($(this).val() && $('#endereco_destino').val()) {
            calculaDistanciaTrageto();
        }
    });

    $('#endereco_destino').focusout(function(){
        if ($(this).val() && $('#endereco_origem').val()) {
            calculaDistanciaTrageto();
        }
    });

    function calculaDistanciaTrageto() {
        $('#btn-solicitar').prop('disabled', true);

        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix({
              origins: [$('#endereco_origem').val()],
              destinations: [$('#endereco_destino').val()],
              travelMode: google.maps.TravelMode.DRIVING,
              unitSystem: google.maps.UnitSystem.METRIC
          }, calcularPrecoServico);
    }

    function calcularPrecoServico(response, status) {
        $('#btn-solicitar').prop('disabled', false);

        if (status != google.maps.DistanceMatrixStatus.OK || !response.rows[0].elements[0].distance) {
            swal({
                title: 'Erro ao calcular o preço do serviço!',
                text: 'Verifique o endereço informado, não deve haver abreviações.',
                type: 'error',
                closeOnConfirm: true
            });
        } else {
            $('#preco').val(
                number_format(response.rows[0].elements[0].distance.value/1000, 2, ',', '.')
            );
        }
    }

    $('#formulario').submit(function(e){
        if ($('#id_motoboy').val()) {
            return true;
        }

        $.ajax({
            url: "{{ action('MotoboyController@selecionarMotoboyDisponivel') }}",
            type: 'GET',
            dataType: 'json',
            beforeSend: function() {
                swal({
                    title: 'Aguarde...',
                    type: 'info',
                    showConfirmButton: false
                });
            },
            success: function(motoboy) {
                if (!motoboy) {
                    swal({
                        title: 'Nenhum motoboy disponível no momento :(',
                        text: 'Tente novamente mais tarde.',
                        type: 'error'
                    });

                    return false;
                }

                $('#id_motoboy').val(motoboy.id);
                $('#nome_motoboy').val(motoboy.nome);
                
                swal({
                    title: 'Motoboy selecionado: ' + motoboy.nome,
                    type: 'success',
                    closeOnConfirm: false
                }, function(){
                    $('#formulario').submit();
                    swal.close();
                });
            }
        });

        return false;
    });
</script>
@endsection
