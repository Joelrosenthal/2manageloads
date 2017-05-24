<template>
  <div class="block">
    <span class="demonstration">Planned Pick  Date</span>
    <el-date-picker
      v-model="value1"
      type="date"
      placeholder="Pick a day" 
      name="delivery_date"
      id="delivery_date">

    </el-date-picker>
  </div>
</template>

<script>
  export default {
    data() {
      return {
      
        value1: '',
        
      };
    }
  };
</script>