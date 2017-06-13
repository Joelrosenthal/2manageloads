<template>
    <div class="container">
        <div class="row">
            
                
            <v-client-table :data="tableData" :columns="columns" :options="options">


               
            </v-client-table>
                
            
        </div>
    </div>
</template>

<script>


    
    export default {


        data:
            function() {
                return {



                    columns: [

                        'id',
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
                                    return <a class="edit-link" href={url}>{row.id}</a>;
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