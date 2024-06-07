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
          "January", "February", "March", "April", "May", "June",
          "July", "August", "September", "October", "November", "December"
        ],
        shortMonthNames: [
          "Jan", "Feb", "Mar", "Apr", "May", "Jun",
          "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
        ],
      };
    },

    watch: {
        dateRange(){
            console.log('====================================');
            console.log(this.dateRange);
            console.log('====================================');
            this.$emit('selectDataRange', this.dateRange);
        }
    }
  };
  </script>
