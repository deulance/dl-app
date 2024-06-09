<template>
  <div >
    <div >

      <form @submit.prevent="submitFilterForm">
        <div class="row mb-3">
          <div class="col-6 col-md-2">
            <div class="form-group">
              <label>Estado</label>
              <div class="input-group">
                <model-select :options="estados_option" v-model="filters.estado" placeholder="Selecione">
                </model-select>
                
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="form-group">
              <label>Data primeira pra&ccedil;a</label>
              <div class="input-group">
                <date-range-picker @selectDataRange="dateFilter" ></date-range-picker>
              </div>
            </div>
          </div>  
          <div class="col-6 col-md-2">
            <div class="form-group">
              <label>Tipo de Bem</label>
              <div class="input-group">
                <model-select :options="tipoDoBem_option" v-model="filters.tipoDoBem" placeholder="Selecione">
                </model-select>
              </div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="form-group">
              <label>Preco primeira pra&ccedil;a</label>
              <div class="input-group">
                <VueSimpleRangeSlider
                  style="width: 300px"
                  :min="0"
                  :max="1000000"
                  exponential
                  v-model="state.range"
                >
                  <template #prefix="{ value }">R$ </template>
                </VueSimpleRangeSlider> 
              </div>
            </div>
          </div>
         
          <div class=" colbtn row col-12 col-md-2 d-flex align-items-center">
            <div class="form-group mb-0">
             
              <div class="input-group">
                <button type="submit" class="btn btn-primary waves-effect">Filtrar</button>
              </div>
            </div>
          </div>
        </div>
        
      </form>
    </div>
    <div>
      <div class="row pb-2">
        <div class="col-6">
          <input type="text" v-model="filter" placeholder="Filtrar por nome">
        </div>
        <div class="dropdownx col-6 align-right" >
          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Colunas
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#" @click="toggleColumn(column)" v-for="column in columns" :key="column">
              <input type="checkbox" :checked="isSelected(column)"> {{ column }}
            </a>
          </div>
        </div>
      </div>
    </div>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th v-for="column in visibleColumns" :key="column" @click="sort(column)">
            {{ column }}
            <span v-if="sortColumn === column">
              {{ sortDirection === 'asc' ? '▲' : '▼' }}
            </span>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="row in paginatedRows" :key="row.id">
          <td v-for="column in visibleColumns" :key="column">{{ row[column.toLowerCase()] }}</td>
        </tr>
      </tbody>
    </table>
    <!-- Navegação da página -->
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <li class="page-item" :class="{ disabled: currentPage === 1 }">
          <a class="page-link" href="#" @click="previousPage">&laquo;</a>
        </li>
        <li class="page-item" v-for="page in totalPages" :key="page" :class="{ active: page === currentPage }">
          <a class="page-link" href="#" @click="goToPage(page)">{{ page }}</a>
        </li>
        <li class="page-item" :class="{ disabled: currentPage === totalPages }">
          <a class="page-link" href="#" @click="nextPage">&raquo;</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
import 'vue-search-select/dist/VueSearchSelect.css'; 
import axios from 'axios';
import { ModelSelect } from "vue-search-select";
import { ModelListSelect } from "vue-search-select";
import DateRangePicker from './DateRangePicker.vue';

import VueSimpleRangeSlider from "vue-simple-range-slider";
import "vue-simple-range-slider/css";
import { reactive, defineComponent } from "vue";

export default {
  components: {
      ModelSelect,
      ModelListSelect,
      DateRangePicker,VueSimpleRangeSlider
      
  },setup() {
    const state = reactive({ range: [20, 1000], number: 10 });
    return { state };
  },
  props: {
    columns: Array,
    deulanceData: Array,
    initiallySelectedColumns: Array,
    tipoDoBem: Array, 
    estados: Array, 
  },
  data() {
    return {
      filter: '',
      priceRange: [1000, 5000],
      estados_option : this.estados,
      tipoDoBem_option: this.tipoDoBem,
      rows:[],
      sortColumn: '',
      sortDirection: 'asc',
      currentPage: 1,
      pageSize: 10,
      selectedColumns:  this.initiallySelectedColumns || [] ,
      filters: {
        estado: '',
        tipoDoBem:'',
        startDateFilter: null,
        endDateFilter: null,
        startPriceFilter: null,
        endPriceFilter: null
      },
    };
  },
  mounted() {
    this.rows = this.deulanceData;
  },
  computed: {
    filteredRows() {
      return this.rows.filter(row => {
        return Object.values(row).some(value => {
          return String(value).toLowerCase().includes(this.filter.toLowerCase());
        });
      });
    },
    filteredAndSortedRows() {
      if (this.sortColumn !== '') {
        return this.filteredRows.slice().sort((a, b) => {
          const aValue = a[this.sortColumn.toLowerCase()];
          const bValue = b[this.sortColumn.toLowerCase()];
          return this.sortDirection === 'asc' ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
        });
      } else {
        return this.filteredRows;
      }
    },
    paginatedRows() {
      const startIndex = (this.currentPage - 1) * this.pageSize;
      const endIndex = startIndex + this.pageSize;
      return this.filteredAndSortedRows.slice(startIndex, endIndex);
    },
    totalPages() {
      return Math.ceil(this.filteredAndSortedRows.length / this.pageSize);
    },
    visibleColumns() {
      // Se não tem colunas selecionadas, mostra todas 
      return this.selectedColumns.length > 0 ? this.selectedColumns : this.columns;
    }
  },
  methods: {
    dateFilter(range) {
      console.log(range);
            if (range && range.length > 0) {
                this.filters.startDateFilter = range[0];
                this.filters.endDateFilter = range[1];
            }else{
                this.filters.startDateFilter = null;
                this.filters.endDateFilter = null;
            }
        },
    sort(column) {
      if (this.sortColumn === column) {
        this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
      } else {
        this.sortColumn = column;
        this.sortDirection = 'asc';
      }
    },
    previousPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    goToPage(page) {
      this.currentPage = page;
    },
    // Verifica se uma coluna está selecionada
    isSelected(column) {
      return this.selectedColumns.includes(column);
    },
    // Alterna a seleção de uma coluna
    toggleColumn(column) {
      if (this.isSelected(column)) {
        this.selectedColumns = this.selectedColumns.filter(col => col !== column);
      } else {
        this.selectedColumns.push(column);
      }
    },
    submitFilterForm() {
      let priceRange = this.state.range;
      if (priceRange && priceRange.length > 0) {
          this.filters.startPriceFilter = priceRange[0];
          this.filters.endPriceFilter = priceRange[1];
      }else{
          this.filters.startPriceFilter = null;
          this.filters.endPriceFilter = null;
      }
      axios.post('/admin/deulanceboard/fetch_data', this.filters)
        .then(response => {
          //this.$emit('update:rows', response.data);
          //console.log( this.rows,response.data );
          this.rows = response.data;
        })
        .catch(error => {
          console.error('Erro ao buscar dados:', error);
        });
    }
    
  }
};
</script>

<style scoped>
 .btn-light{
        background-color: white !important;
        border: 1px solid #ddd !important;
    }
  .dropdown-menu.show {
    height:300px;
    overflow-y: scroll;
    overflow-x: hidden;
  }
  @media (max-width: 768px)  {
      
    
    .colbtn{
      justify-content: center !important;
    }
  }
</style>
