<div class="panel-wrapper dashboard-listing-wrapper">

    <div class="panel-inner">

        <div    class="data-table-listing" 
                data-type="data-table"
				data-source="<?=$params["data_source"]?>"
                data-header-text="<?=__('Dashboard List')?>"
                data-allow-download=1
                data-filter-by="dashboard-listing-filter"
                data-url-details=""
                data-download-filename='<?=$params['download_filename']?>'
        ></div> 

    </div>

</div><!-- end of wrapper -->


<script>
     window.keys_mapping = {
		customer_first_name: "<?=__('Customer First Name')?>", 
		customer_last_name: "<?=__('Customer Last Name')?>", 
		product_name: "<?=__('Product Name')?>", 
        order_total: "<?=__('Order Total')?>",
		created_at: "<?=__('Created At')?>", 
		invoice_number: "<?=__('Invoice Number')?>", 
		transaction_date: "<?=__('Transaction Date')?>", 
		amount: "<?=__('Amount')?>"
    };

    window.sort_mapping = {
        customer_first_name: "customer_first_name",
        customer_last_name: "customer_last_name",
        product_name: "product_name",
        order_total: "order_total",
        created_at: "created_at",
        invoice_number: "invoice_number",
        transaction_date: "transaction_date",
        amount: "amount"
    };

</script>

<script type="module">

    import {DataTable} from "<?=get_script_uri('controllers/data-table')?>"; 
    let data_table = new DataTable();
    data_table.init(document.querySelector(".dashboard-listing-wrapper [data-type='data-table']"));

</script>
