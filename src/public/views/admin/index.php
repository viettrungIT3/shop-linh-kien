﻿<!-- Start container-fluid -->
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Welcome !</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div>
                <div class="card-box widget-inline">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 widget-inline-box">
                            <div class="text-center p-3">
                                <h2 class="mt-2"><i class="text-primary mdi mdi-access-point-network mr-2"></i> <b>8954</b></h2>
                                <p class="text-muted mb-0">Lifetime total sales</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 widget-inline-box">
                            <div class="text-center p-3">
                                <h2 class="mt-2"><i class="fas fa-play-circle"></i> <b>7841</b></h2>
                                <p class="text-muted mb-0">Income amounts</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 widget-inline-box">
                            <div class="text-center p-3">
                                <h2 class="mt-2"><i class="text-info mdi mdi-black-mesa mr-2"></i> <b>6521</b></h2>
                                <p class="text-muted mb-0">Total users</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="text-center p-3">
                                <h2 class="mt-2"><i class="text-danger mdi mdi-cellphone-link mr-2"></i> <b>325</b></h2>
                                <p class="text-muted mb-0">Total visits</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <h5 class="mt-0 font-14">Total Revenue</h5>
                <div class="text-center">
                    <ul class="list-inline chart-detail-list">
                        <li class="list-inline-item">
                            <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-primary"></i>Series A</p>
                        </li>
                        <li class="list-inline-item">
                            <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-muted"></i>Series B</p>
                        </li>
                    </ul>
                </div>
                <div id="dashboard-bar-stacked" class="morris-chart" dir="ltr" style="height: 300px;"></div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-6">
            <div class="card-box">
                <h5 class="mt-0 font-14">Sales Analytics</h5>
                <div class="text-center">
                    <ul class="list-inline chart-detail-list">
                        <li class="list-inline-item">
                            <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-primary"></i>Mobiles</p>
                        </li>
                        <li class="list-inline-item">
                            <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-info"></i>Tablets</p>
                        </li>
                    </ul>
                </div>
                <div id="dashboard-line-chart" class="morris-chart" dir="ltr" style="height: 300px;"></div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h5 class="mt-0 font-14 mb-3">Contacts</h5>
                <div class="table-responsive">
                    <table class="table table-hover mails m-0 table table-actions-bar table-centered">
                        <thead>
                            <tr>
                                <th style="min-width: 95px;">

                                    <div class="checkbox checkbox-single checkbox-primary">
                                        <input type="checkbox" class="custom-control-input" id="action-checkbox">
                                        <label class="custom-control-label" for="action-checkbox">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Products</th>
                                <th>Start Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <div class="checkbox checkbox-primary mr-2 float-left">
                                        <input id="checkbox2" type="checkbox">
                                        <label for="checkbox2"></label>
                                    </div>

                                    <img src="<?php echo (get_media_uri('images/users/avatar-2.jpg')); ?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                </td>

                                <td>
                                    Tomaslau
                                </td>

                                <td>
                                    <a href="#" class="text-muted">tomaslau@dummy.com</a>
                                </td>

                                <td>
                                    <b><a href="" class="text-dark"><b>356</b></a>
                                    </b>
                                </td>

                                <td>
                                    01/11/2003
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="checkbox checkbox-primary mr-2 float-left">
                                        <input id="checkbox1" type="checkbox">
                                        <label for="checkbox1"></label>
                                    </div>

                                    <img src="<?php echo (get_media_uri('admin/users/avatar-1.jpg')); ?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                </td>

                                <td>
                                    Chadengle
                                </td>

                                <td>
                                    <a href="#" class="text-muted">chadengle@dummy.com</a>
                                </td>

                                <td>
                                    <b><a href="" class="text-dark"><b>568</b></a>
                                    </b>
                                </td>

                                <td>
                                    01/11/2003
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="checkbox checkbox-primary mr-2 float-left">
                                        <input id="checkbox3" type="checkbox">
                                        <label for="checkbox3"></label>
                                    </div>

                                    <img src="<?php echo (get_media_uri('images/users/avatar-3.jpg')); ?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                </td>

                                <td>
                                    Stillnotdavid
                                </td>

                                <td>
                                    <a href="#" class="text-muted">stillnotdavid@dummy.com</a>
                                </td>
                                <td>
                                    <b><a href="" class="text-dark"><b>201</b></a>
                                    </b>
                                </td>

                                <td>
                                    12/11/2003
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="checkbox checkbox-primary mr-2 float-left">
                                        <input id="checkbox4" type="checkbox">
                                        <label for="checkbox4"></label>
                                    </div>

                                    <img src="<?php echo (get_media_uri('images/users/avatar-4.jpg')); ?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                </td>

                                <td>
                                    Kurafire
                                </td>

                                <td>
                                    <a href="#" class="text-muted">kurafire@dummy.com</a>
                                </td>

                                <td>
                                    <b><a href="" class="text-dark"><b>56</b></a>
                                    </b>
                                </td>

                                <td>
                                    14/11/2003
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="checkbox checkbox-primary mr-2 float-left">
                                        <input id="checkbox5" type="checkbox">
                                        <label for="checkbox5"></label>
                                    </div>

                                    <img src="<?php echo (get_media_uri('images/users/avatar-5.jpg')); ?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                </td>

                                <td>
                                    Shahedk
                                </td>

                                <td>
                                    <a href="#" class="text-muted">shahedk@dummy.com</a>
                                </td>

                                <td>
                                    <b><a href="" class="text-dark"><b>356</b></a>
                                    </b>
                                </td>

                                <td>
                                    20/11/2003
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class="checkbox checkbox-primary mr-2 float-left">
                                        <input id="checkbox6" type="checkbox">
                                        <label for="checkbox6"></label>
                                    </div>

                                    <img src="<?php echo (get_media_uri('images/users/avatar-6.jpg')); ?>" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm">
                                </td>

                                <td>
                                    Adhamdannaway
                                </td>

                                <td>
                                    <a href="#" class="text-muted">adhamdannaway@dummy.com</a>
                                </td>

                                <td>
                                    <b><a href="" class="text-dark"><b>956</b></a>
                                    </b>
                                </td>

                                <td>
                                    24/11/2003
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
<!-- end container-fluid -->