@extends('admin.layouts.index')
@section('style')

@endsection
@section('content')
<div class="main-content">
    <div class="card">
        <div class="card-body">
            <div id="deulance">
                <data-table :columns="{{ json_encode( array_map('ucwords', ['id', 'URL', 'titulo', 'cidade', 'estado', 'endereco', 'status_leilao', 'tipo_de_bem', 'status_imovel', 'valor_inicial_lance_minimo', 'leiloeiro', 'incremento', 'data_1a_praca', 'preco_1a_praca', 'discount_1_to_2', 'data_2a_praca', 'preco_2a_praca', 'discount_2_to_3', 'data_3a_praca', 'preco_3a_praca', 'valor_de_avaliacao', 'numero_de_visitas', 'qualificado', 'ultimo_lance', 'numero_do_lance', 'numero_do_lote', 'maior_lance', 'area_util', 'links_relevantes_edital', 'links_relevantes_matricula', 'links_relevantes_fotos', 'area_total', 'area_construida', 'area_de_terreno', 'observacoes', 'area_privativa', 'processo', 'descricao_completa']) )}}"
                :deulance-data="{{ json_encode($allItems) }}" 
                :initially-selected-columns="{{ json_encode( ['Id', 'Titulo', 'Cidade', 'Estado'] ) }}"
                :tipo-do-bem="{{ json_encode($tiposDeBem) }}" 
                :estados="{{ json_encode($estados) }}" 
                >

                </data-table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
@endpush