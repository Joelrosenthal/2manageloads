<template>
    <div class="container-fluid">
        
            
                
            <v-client-table id="shipmentts" :data="tableData" :columns="columns" :options="options"></v-client-table>
                
            
        
    </div>
</template>

<script>


    
    export default {


        data:
            function() {
                return {



                    columns: [

                        'id',
                        'ref_number',
                        'po_number',
                        'pick_city', 
                        'pick_state', 
                        'delivery_city',
                        'delivery_state',
                        'pick_date',
                        'delivery_date',
                        'urgency',
                        'commodity',
                        'special_instructions',

                        
                        ],


                    tableData: window.data,
                    options: 
                        {
                            filterByColumn:true,
                            templates: {
                                id: function(h, row) {
                                    let url=`/shipment/${row.id}/edit`
                                    return <a class="edit-link" href={url}>View</a>;
                                }
                            }
                            

                        }
                        
                    
                        }


            }
        
    }

</script>
<style>
.edit-link {
    color: black;
}


</style>