<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="{{ asset('/assets/css/dashboard.css', env("secure")) }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 
     <script src="{{ asset('/assets/js/addrow.js', env("secure")) }}"></script>
   </head>
<body>
  @include("slidebar")

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Company Name </div>
            <!--<div class="number"></div>-->
            <input class="field__input" name="c_name" id="c_name_top">
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Contact Number</div>
            <!--<div class="number"></div>-->
            <input class="field__input" name="comp_mod" id="comp_mob_top">
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Gst No.</div>
            <!--<div class="number"></div>-->
            <input class="field__input" name = "comp_gst" id="comp_gst_top">
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Date</div>
            <div class="number">{{ date("d-m-y") }}</div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
              <span class="text">Down From Today</span>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>
      
      <form id="withgst" action="generatedoc" method="POST">
        @csrf
      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Particulars</div>
          <div class="sales-details">
            <table class="particulars">
                <tr>
                    <th>SR No.</th>
                    <th>Particulars</th>
                    <th>HSN Code</th>
                    <th>Pieces</th>
                    <th>Rate per pieces</th>
                    <th colspan="2">Amount
                        <table>
                            <th>Rs.</th>
                            <th>Ps.</th>
                        </table>
                    </th>
                </tr>
                @for($i = 1; $i < 7; $i++)
                <tr>
                    <td>
                        <label class="field field_v1">
                        <input class="field__input" name="Sno{{ $i }}" value="{{ $i }}">
                        </label>
                    </td>
                    <td>
                        <label class="field field_v1">
                        <input class="field__input" name="particular{{ $i }}">
                        </label>
                    </td>
                    <td>
                        <label class="field field_v1">
                        <input class="field__input" name="hsn{{ $i }}">
                        </label>
                    </td>
                    <td>
                        <label class="field field_v1" >
                        <input class="field__input pieces {{ $i }}" name="pieces{{ $i }}">
                        </label>
                    </td>
                    <td>
                        <label class="field field_v1">
                        <input class="field__input rate {{ $i }}" name="rate{{ $i }}">
                        </label>
                    </td>
                    <td>
                        <label class="field field_v1">
                        <input class="field__input" name="Rs{{ $i }}" readonly>
                        </label>
                    </td>
                    <td>
                        <label class="field field_v1">
                        <input class="field__input" name="Ps{{ $i }}" readonly>
                        </label>
                    </td>
                </tr>
                @endfor
            </table>
          </div>
          <div><a href="#" title="" class="add-particular">Add Particular</a></div>
          <div style="justify-content: flex-end;display:flex">
            <label class="field field_v1">
              <input class="field__input" name="total_val" readonly>
              <span class="field__label-wrap">
                <span class="field__label">Total Amount</span>
              </span>
            </label>
          </div>
          <div class="button">
            <button href="#" type="submit" >Submit</button>
          </div>
          
          <!-- Basic Details -->
          
          <div class="title">Basic Details</div>
          <ul class="top-sales-details">
            <li>
                <label class="field field_v1">
                    <input class="field__input" name="c_name" id="c_name">
                    <span class="field__label-wrap">
                      <span class="field__label">Company name</span>
                    </span>
                  </label>
                  <label class="field field_v1">
                    <input class="field__input" name = "comp_gst" id="comp_gst">
                    <span class="field__label-wrap">
                      <span class="field__label">Gst No.</span>
                    </span>
                  </label>
          </li>
          <li>
            <label class="field field_v1">
                <input class="field__input" name="comp_add" id="comp_add" >
                <span class="field__label-wrap">
                  <span class="field__label">Address</span>
                </span>
              </label>
              <label class="field field_v1">
                <input class="field__input" name="comp_mod" id="comp_mob">
                <span class="field__label-wrap">
                  <span class="field__label">Contact No.</span>
                </span>
              </label>
          </li>
          <li>
            <label class="field field_v1">
                <input class="field__input" name="bill_name" id="bill_name">
                <span class="field__label-wrap">
                  <span class="field__label">Billed to</span>
                </span>
              </label>
              <label class="field field_v1">
                <input class="field__input" name="bill_gst" id="bill_gst">
                <span class="field__label-wrap">
                  <span class="field__label">Billed Gst No.</span>
                </span>
              </label>
          </li>
          <li>
            <label class="field field_v1">
                <input class="field__input" name="bill_add" id="bill_add">
                <span class="field__label-wrap">
                  <span class="field__label">Address</span>
                </span>
              </label>
              <label class="field field_v1">
                <input class="field__input" name="bill_mod" id="bill_mob">
                <span class="field__label-wrap">
                  <span class="field__label">Contact No.</span>
                </span>
              </label>
          </li>
          <li>
            <label class="field field_v1">
                <input class="field__input" name = "invoice" id="invoice">
                <span class="field__label-wrap">
                  <span class="field__label">Invoice No.</span>
                </span>
              </label>
              <label class="field field_v1">
                <input class="field__input" name="inDate"value="{{ date('d-m-y') }}">
                <span class="field__label-wrap">
                  <span class="field__label">Date</span>
                </span>
              </label>
          </li>
          <li>
            <label class="field field_v1">
                <input class="field__input" name="challan">
                <span class="field__label-wrap">
                  <span class="field__label">Challan No.</span>
                </span>
              </label>
              <label class="field field_v1">
                <input class="field__input" name="chDate"value="{{ date('d-m-y') }}">
                <span class="field__label-wrap">
                  <span class="field__label">Date</span>
                </span>
              </label>
          <li>
            <label class="field field_v1">
                <input class="field__input" name="DispatchBy">
                <span class="field__label-wrap">
                  <span class="field__label">Dispatched By</span>
                </span>
              </label>
          </li>
          </ul>
        </div>

        <!--Labour Job Only-->
        <div class="top-sales box">
          <div class="title">Labour Job Only</div>
          <ul class="top-sales-details">
            <li>
                <label class="field field_v1">
                    <input class="field__input" name="total_val" readonly>
                    <span class="field__label-wrap">
                      <span class="field__label">Total Amount</span>
                    </span>
                  </label>
                  <label class="field field_v1">
                    <input class="field__input" name = "sgst" readonly>
                    <input type="hidden" name="sgst_rate" value="{{ $rates['sgst_rate'] }}">
                    <span class="field__label-wrap">
                      <span class="field__label">SGST @ {{ $rates['sgst_rate'] }}%</span>
                    </span>
                  </label>
          </li>
          <li>
            <label class="field field_v1">
                <input class="field__input" name="cgst" readonly>
                <input type="hidden" name="cgst_rate" value="{{ $rates['cgst_rate'] }}">
                <span class="field__label-wrap">
                  <span class="field__label">CGST @ {{ $rates['cgst_rate'] }}%</span>
                </span>
              </label>
              <label class="field field_v1">
                <input class="field__input" name="igst">
                <input type="hidden" name="igst_rate" value="{{ $rates['igst_rate'] }}">
                <span class="field__label-wrap">
                  <span class="field__label">IGST @ {{ $rates['igst_rate'] }}%</span>
                </span>
              </label>
          </li>
          <li>
            <label class="field field_v1">
                <input class="field__input" name="taxval" readonly>
                <span class="field__label-wrap">
                  <span class="field__label">Taxable Value</span>
                </span>
              </label>
          </li>
          <li>
            <label class="field field_v1">
                <input class="field__input" name="finalVal" readonly>
                <span class="field__label-wrap">
                  <span class="field__label">Final Amount(Amount + Tax)</span>
                </span>
              </label>
          </li>
          </ul>
          <div class="title">Bank Details</div>
          <ul class="top-sales-details">
            <li>
                <label class="field field_v1">
                    <input class="field__input" name="bank_name" required>
                    <span class="field__label-wrap">
                      <span class="field__label">Bank Name</span>
                    </span>
                  </label>
                  <label class="field field_v1">
                    <input class="field__input" name = "acc_name" required>
                    <span class="field__label-wrap">
                      <span class="field__label">Account Name</span>
                    </span>
                  </label>
          </li>
          <li>
            <label class="field field_v1">
                <input type="number" class="field__input" name="acc_num" required>
                <span class="field__label-wrap">
                  <span class="field__label">Current Account Number</span>
                </span>
              </label>
              <label class="field field_v1">
                <input type="text" class="field__input" name="ifsc_code" required >
                <span class="field__label-wrap">
                  <span class="field__label">Bank IFSC CODE</span>
                </span>
              </label>
          </li>
          </ul>
        </div>
      </div>
    </div>
</form>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>


</body>
</html>

