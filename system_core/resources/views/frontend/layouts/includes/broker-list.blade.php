@if ($brokers->count() > 0 )
<section class="wow fadeInRight" data-wow-duration="0.8s">
  <div class="container">
    <div class="row">
      <!-- Broker Filters -->
      <div class="col-md-12">
        <span style="background: #dedede;padding: 5px 5px;color: #3a3838;margin: 0; display:block; padding: 10px;font-size: 20pt; font-weight: 600;text-transform: uppercase;">Forex Broker List</span>
        <!-- Sort Dropdown -->
        <!-- <div class="dropdown-new sm-width pull-right ml-2">
            <div class="select">
              <span>Sort By</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="sort">
            <ul class="dropdown-menu-new call-sort">
              <li data-void data-sort-column="0" data-sort-direction="ASC">Rank</li>
              <li data-void data-sort-column="1" data-sort-direction="ASC">Broker's Name</li>
              <li data-void data-sort-column="3" data-sort-direction="ASC" class="sm-none">Minimum Diposite</li>
              <li data-void data-sort-column="4" data-sort-direction="ASC" class="sm-none">Diposite Bonus</li>
              <li data-void data-sort-column="5" data-sort-direction="ASC" class="sm-none">Type of Platform</li>
            </ul>
          </div> -->
        <!-- Sort Dropdown End -->
        <!-- Filter Dropdown -->
        <!-- <div class="dropdown-new sm-width pull-right">
            <div class="select">
              <span>Filter By Category</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="sort">
            <ul class="dropdown-menu-new filter-show">
              <li>All Catagories</li>
              <li>MetaTrader 4</li>
              <li>Proprietary platform</li>
            </ul>
          </div> -->
        <!-- Filter Dropdown End -->
      </div>
      <!-- Broker Filters End -->
      <div class="col-md-12">
        <div id="app">
          <table class="table broker-table vps index-toggle" id="broker-table" data-show-toggle="true" data-expand-first="false" data-paging="true" data-filter-container>
            <thead>
              <tr>
                <th class="rank-width" data-filterable="false"><span class="rank-head">Rank</span></th>
                <th class="broker-nwidth" data-filterable="false">Broker's Name</th>

                <th class="broker-nwidth">User Rating</th>
                <th data-sortable="false" data-filterable="false">Regulation</th>
                <th class="d-width" data-filterable="false"><span class="sm-width-table-review">Minimum Deposit</span></th>
                <th class="broker-nwidth" data-filterable="false"><span class="sm-width-table-review">Max leverage</span></th>
                <th data-sortable="false" data-filterable="false"><span class="sm-width-table-review">Type of Platform</span></th>
                <th data-sortable="false" data-filterable="false">More Info</th>
              </tr>
            </thead>
            <tbody>
              @foreach($brokers as $key => $broker)
                <tr>
                  <td class="color-gray" data-sort-value="1">
                    <div class="position-relative"><i class="fa fa-bookmark"></i> <span class="rank">{{ $key+1 }}</span></div>
                  </td>
                  <td data-sort-value="Pepperstone">
                    <div class="broker-image img-tooltip glass">
                      <a href="javascript:void(0)">
                        <img src="{{ asset('/broker/logo/125x56-'.$broker->logo) }}" alt="Pepperstone" height="43">
                      </a>
                      <div class="broker-tooltip">
                        <div class="broker-info-container">
                          <h3>Company Name</h3>
                          <p>{{ $broker->name }}</p>
                        </div>
                      </div>
                      @if ($broker->premium == 1)
                        <span class="premium-tag">premium</span>
                      @endif
                    </div>
                  </td>

                  <td>
                    <div class="social-share-icons d-flex flex-column">
                      <ul class="m-0 p-0 list-unstyled">
                        <li>
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                        </li>
                        <li>5.0 (6 reviews)</li>
                      </ul>
                    </div>
                  </td>
                  <td>
                  <button class="btn btn-default broker-regulated-information" onmouseover="this.innerHTML='Click Here';" onmouseout="this.innerHTML='Regulated';" data-content="{{ $broker }}" data-toggle="modal" data-target="#broker-regulated-information">Regulated</button>
                  </td>
                  <td>{{ $broker->min_deposit }}</td>
                  <td>{{ $broker->meta['max_leverage'] }}</td>
                  <td class="trader-platform">{{ $broker->trading_platform}}
                    @foreach($broker->trading_platforms as $trading_platform)
                      {{ $trading_platform->name }}
                    @endforeach
                  </td>
                  <td>
                  <a class="btn" target="_blank" href="{{ $broker->meta['real_acc_link'] }}" style="padding: 5px 10px;border-radius: 4px;min-width: inherit; margin: 0; background: #28a745;font-size: 11px;">Open Account</a>
                    <p><a href="{{ url('/forex-broker/'.$broker->slug) }}" target="_blank">Check Reviews</a></p>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12">
        <div class="text-center w-100 mt-3 mb-3">
          <!-- <a href="broker.html" class="btn blue-btn"><span>VIEW MORE Brokers</span></a> -->
          <a href="{{ url('/forex-brokers') }}" class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4">VIEW MORE Brokers <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="shape shap1 s-fix"></div>
</section>
@else
  <div class="alert alert-warning">No Broker Found</div>
@endif