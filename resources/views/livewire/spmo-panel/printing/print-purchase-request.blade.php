<div>
    <style>
        *{
            font-family: serif;
            font-size: 9pt;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        @page { 
            margin-top: 0.25in;
            margin-left: 0.25in;
            margin-right: 0.25in;
            margin-bottom: 0.25in;
            size: 8.5in 14in;
        }
    
    </style>
    
    
    <div>
        <div style="text-align: center;">
            <img src="image/logo/headerlogo.jpg" style="width:5in;">
        </div>
        <br>
        <div style="text-align: center;">
            <strong><span style="font-size: 14pt;">PURHASE REQUEST</span></strong>
        </div>
        <div style="text-align: center;">
            <table style="width: 8in">
                    <tr>
                        <td rowspan="2" colspan="2" style="text-align: center;">Department</td>
                        <td rowspan="2" style="text-align: center">{{ $office }}</td>
                        <td width="7%" rowspan="2"style="vertical-align:top;">Section:</td>
                        <td rowspan="2"></td>
                        <td>PR No.:</td>
                        <td colspan="2" style="text-align: center">{{ $pr_no }}</td>
                    </tr>
                    <tr>
                        
                        
                        
                        
                        <td>PR Date.:</td>
                        <td  colspan="2" style="text-align: center">{{ $pr_date }}</td>
                    </tr>
                    <tr>
                        <th width="6.5%" style="text-align: center">App Line Item No.</th>
                        <th width="6.5%"  style="text-align: center">Unit of Measure</th>
                        <th width="56%" colspan="3" style="text-align: center">Item Description</th>
                        <th width="7%" style="text-align: center">Qty</th>
                        <th width="12%" style="text-align: center">Estimated Unit Cost</th>
                        <th width="12%" style="text-align: center">Estimated Total Cost</th>
                    </tr>
                    <tr>
                        <td colspan="5">
                            Please provide correct and accurate information required in this form. Accomplish this form in (4) copies.
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @foreach($PurchaseRequestItem as $index => $purchaseRequestitem)
                        <tr>
                            <td style="text-align: center">{{ $index+1 }}</td>
                            <td style="text-align: center">{{ $purchaseRequestitem->unit_measure }}</td>
                            <td colspan="3">{{ $purchaseRequestitem->item_description }}</td>
                            <td style="text-align: center">{{ $purchaseRequestitem->qty }}</td>
                            <td style="text-align: right">{{ number_format($purchaseRequestitem->estimated_cost, 2, '.', ',') ?? '0' }}</td>
                            <td style="text-align: right">
                                {{ number_format($purchaseRequestitem->estimated_cost*$purchaseRequestitem->qty, 2, '.', ',') ?? '0' }}
                                <?php
                                    $total_all+=$purchaseRequestitem->estimated_cost*$purchaseRequestitem->qty;
                                ?>
                            </td>
                        </tr>
                    @endforeach
                    @for ($list_size = 1; $list_size <= 25-count($PurchaseRequestItem); $list_size++)
                        <tr>
                            <td style="height: 15px"></td>
                            <td></td>
                            <td colspan="3"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endfor
                    
                    <tr>
                        <th colspan="8" style="text-align: left;padding-left:.65in;height: 20px;"><span><i>  </i></span></th>
                    </tr>
                    <tr>
                        <th colspan="8" style="text-align: left;padding-left:1.10in;height: 20px;">
                            <span>
                                <i>
                                    {{--  --}}
                                </i>
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="8" style="text-align: left;padding-left:1.10in;height: 20px;">
                            <span>
                                <i>
                                    {{--  --}}
                                </i>
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="7" style="text-align: right;padding-right:0.30in;height: 35px;">
                            Total
                        </th>
                        <th style="text-align: center;">
                            {{ number_format($total_all, 2, '.', ',') ?? '0' }}
                        </th>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: left;height: 35px;">
                            <div style="width: 1.1in;float:left">
                                <strong>Purpose:</strong>
                            </div>
                            <div style="width: 6.90in;float:right">
                                {{ $purpose }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: left;height: 110px;vertical-align:top;">
                            <div style="line-height: 10%;">
                                <p>Name of Property (in case of repair) :__________________________________________________________</p>
                                <p>Name of Procurement per APP :______________________________________________________________</p>
                            </div>
                            <br>
                            <div style="width: 3in;float:left;padding-left:0.55in;line-height: 150%;">
                                    <div>
                                        The aforementioned is/are:
                                    </div>
                                    <div style="padding-left:0.15in;">
                                        <img src="image/logo/circle.jpg" style="width:0.10in">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lot purchase
                                        <br>
                                        <img src="image/logo/circle.jpg" style="width:0.10in">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;per item purchase
                                    </div>
                            </div>
                            <div style="width: 3in;float:right">
                                APP Reference No(s).:_____________________________
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: left;height: 110px;vertical-align:top;">
                            <div style="line-height: 30%;">
                                <p><strong>CERTIFICATION OF REQUESTING PARTY:</strong></p>
                                <p style="font-size: 8pt;">
                                    1. The foregoing requisition has been reviewed for its technical sufficiency and price validity and has been found to be accurate and suitable for the procurement thereof.
                                </p>
                                <p style="font-size: 8pt;">
                                    2. I hereby certify under the penalty of law that the items requested above are covered by any PR to the SPMO. Should the undersigned eventually learn of the existence of such
                                </p> 
                                <p style="font-size: 8pt;">
                                    other request form requisitioned, the undersigned shall immediately advise the SPMO thereof. In case the above goods are already covered by the previous PR submitted to the
                                </p>
                                <p style="font-size: 8pt;">
                                    SPMO and these goods are nevertheless purchased through this PR, I shall be responsible for paying the same to supplier. I shall reimburse the bid bonds and performance bonds
                                </p>
                                <p style="font-size: 8pt;">
                                    of winning suppliers in case these goods are already subjected to the public bidding.
                                </p>
                                <p style="font-size: 8pt;">
                                    3. Supplies requisitioned are necessary and will be used solely for purposes stated.
                                </p>

                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" style="text-align: left;">
                            <br><br><br>
                            Signature:
                            <br>
                            Printed Name:
                            <br>
                            Designation: 
                        </td>
                        <td colspan="6">
                            <div style="width: 3in;float:left">
                                Requested by: 
                                    <br><br><br><br>
                                    <div style="text-align: center;">
                                        <strong>{{ $UserName }}</strong>
                                        <br>
                                        {{ $Office }}
                                    </div>
                            </div>
                            <div style="width: 2.50in;float:right"> 
                                Approved by:
                                <br><br><br><br>
                                <div style="text-align: center;">
                                    <strong>JOEL P. LIMSON, Ph.D.</strong>
                                    <br>
                                    University President
                                </div>
                            </div>
                        </td>
                    </tr>
                    
            </table>
        </div>
    </div>


</div>