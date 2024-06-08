<template>
    <div>
      <datepicker
        v-model="dateRange"
        format="yyyy-MM-dd"
        range
        :month-names="monthNames"
        :short-month-names="shortMonthNames"
      ></datepicker>
    </div>
  </template>

  <script>
  import Datepicker from "@vuepic/vue-datepicker";
  import '@vuepic/vue-datepicker/dist/main.css'

  export default {
    components: {
      Datepicker,
    },
    data() {
      return {
        dateRange: {
          start: null,
          end: null,
        },
        monthNames: [
          "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
          "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
        ],
        shortMonthNames: [
          "Jan", "Fev", "Mar", "Abr", "Mai", "Jun",
          "Jul", "Ago", "Set", "Out", "Nov", "Dez"
        ],
      };
    },

    watch: {
        dateRange(){
           // console.log('====================================');
           // console.log(this.dateRange);
           // console.log('====================================');
           this.$emit('selectDataRange', this.dateRange);
        }
    }
  };
  </script>
