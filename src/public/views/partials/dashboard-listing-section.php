<div class="wrapper section-wrapper">
    <div class="wrapper-inner container">

        <div class="section-header">
            <div class="section-header-inner">
                <h2><?=__("Dashboard Export Data ")?></h2>
            </div><!-- end of section heaer inner -->
        </div><!-- section headr -->

        <?php $this->load->view("partials/dashboard-listing-filters");?>
        <?php $this->load->view("partials/dashboard-listing");?>

    </div><!-- end  wrapper inner -->
</div><!-- end of section wrapper -->
