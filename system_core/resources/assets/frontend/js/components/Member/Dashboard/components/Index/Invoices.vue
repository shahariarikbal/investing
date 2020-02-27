<template>
    <div class="invoice-list-container mt-0">
        <h4 class="list-header">All Invoice</h4>
        <ul data-simplebar="init">
            <div class="simplebar-track vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar" style="height: 270px; transform: translate3d(0px, 0px, 0px);"></div>
            </div>
            <div class="simplebar-track horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar"></div>
            </div>
            <div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
                <div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
                    <li>
                        <p class="invoice-title">Invoice For Activating Services That Has Been Recently Activated By You</p>
                        <a href="javascript:void(0)" class="btn btn-success custom-btn m-0 click-disable"><span>paid</span></a>
                        <a href="javascript:void(0)" class="btn btn-default m-0 custom-btn view-invoice" data-toggle="modal" data-target="#invoice-modal"><span>View Invoice</span></a>
                    </li>
                    <li class="overdue">
                        <p class="invoice-title">Invoice For Activating Services That Has Been Recently Activated By You</p>
                        <a href="javascript:void(0)" class="btn btn-danger custom-btn m-0 click-disable"><span>unpaid</span></a>
                        <a href="javascript:void(0)" class="btn btn-default custom-btn view-invoice" data-toggle="modal" data-target="#invoice-modal"><span>View Invoice</span></a>
                        <a href="javascript:void(0)" class="btn btn-default custom-btn m-0"><span>Pay Now</span></a>

                    </li>
                    <li>
                        <p class="invoice-title">Invoice For Activating Services That Has Been Recently Activated By You</p>
                        <a href="javascript:void(0)" class="btn btn-warning custom-btn m-0 click-disable"><span>cancelled</span></a>
                        <a href="javascript:void(0)" class="btn btn-default custom-btn view-invoice" data-toggle="modal" data-target="#invoice-modal"><span>View Invoice</span></a>

                    </li>
                    <li>
                        <p class="invoice-title">Invoice For Activating Services That Has Been Recently Activated By You</p>
                        <a href="javascript:void(0)" class="btn btn-info custom-btn m-0 click-disable"><span>refunded</span></a>
                        <a href="javascript:void(0)" class="btn btn-default custom-btn view-invoice " data-toggle="modal" data-target="#invoice-modal"><span>View Invoice</span></a>

                    </li>
                    <li>
                        <p class="invoice-title">Invoice For Activating Services That Has Been Recently Activated By You</p>
                        <a href="javascript:void(0)" class="btn btn-success custom-btn m-0 click-disable"><span>paid</span></a>
                        <a href="javascript:void(0)" class="btn btn-default custom-btn view-invoice" data-toggle="modal" data-target="#invoice-modal"><span>View Invoice</span>
                </a>

                    </li>
                    <li class="">
                        <p class="invoice-title">Invoice For Activating Services That Has Been Recently Activated By You</p>
                        <a href="javascript:void(0)" class="btn btn-warning custom-btn m-0 click-disable"><span>renewed</span></a>
                        <a href="javascript:void(0)" class="btn btn-default custom-btn view-invoice" data-toggle="modal" data-target="#invoice-modal"><span>View Invoice</span></a>
                    </li>
                </div>
            </div>
        </ul>
    </div>
</template>