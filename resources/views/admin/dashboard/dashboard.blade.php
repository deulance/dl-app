@extends('admin.layouts.index')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row ">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-0 pt-3">
                                        <div class="card-content">
                                            <?php 
                                            //print_r( Auth::guard('admin')->user()->id );
                                            if( Auth::guard('admin')->user()->hasPermission('Ver Tabela') || Auth::guard('admin')->user()->hasPermission('full access') ) : 
                                            ?>
                                                <h2 class="mb-3 font-18">Conta ativada</h2>
                                            <?php else : ?>
                                            
                                                <h5 class="font-15"></h5>
                                                <h2 class="mb-3 font-18">Ative sua conta</h2>
                                                <div> 
                                                    <p>Pague utlizando o PIX QR Code para ter acesso:</p>
                                                    <img src="{{asset('assets/img/qrcode-pix.png')}}">
                                                    <p>Ou copie o codigo abaixo</p>
                                                    <code>
                                                        00020126580014BR.GOV.BCB.PIX0136090aca2b-d098-45fe-920e-9fa0a46aada6520400005303986540550.005802BR5921Felipe Nogueira Braga6009SAO PAULO610805409000622405203vS4YKPEQL7G9YA2pg9n6304EE4B
                                                    </code>
                                                </div>    
                                            
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </section>
    </div>
@endsection
