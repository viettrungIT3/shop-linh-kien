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
		customer_first_name: "<?=__('First Name')?>", 
		customer_last_name: "<?=__('Last Name')?>", 
        order_number: "<?=__('Order Number')?>",
        order_date: "<?=__('Order Date')?>",
		order_price: "<?=__('Order Price')?>",
		invoice_number: "<?=__('Invoice Number')?>", 
        transId: "<?=__('Trans ID')?>", 
		transaction_date: "<?=__('Transaction Date')?>", 
		amount: "<?=__('Amount')?>"
    };

    window.sort_mapping = {
        customer_first_name: "customer_first_name",
        customer_last_name: "customer_last_name",
        order_number: "order_number",
        order_date: "order_date",
        order_price: "order_price",
        invoice_number: "invoice_number",
        transId: "transId",
        transaction_date: "transaction_date",
        amount: "amount"
    };

</script>

<script type="module">

    import {DataTable} from "<?=get_script_uri('controllers/data-table')?>"; 
    let data_table = new DataTable();
    data_table.init(document.querySelector(".dashboard-listing-wrapper [data-type='data-table']"));

</script>
