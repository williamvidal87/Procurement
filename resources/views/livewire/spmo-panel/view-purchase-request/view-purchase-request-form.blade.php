<div>
        <div class="modal-header">
            <h1 class="modal-title" id="exampleModalLabel">Purchase Request</h1>
            <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewPuchaseRequestForm"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">





<div>
    
    
    <div style="font-family: serif;font-size: 9pt;color: #000000;">
        <div style="text-align: center;">
            <img src="image/logo/headerlogo.jpg" style="width:5in;">
        </div>
        <br>
        <div style="text-align: center;">
            <strong><span style="font-size: 14pt;">PURHASE REQUEST</span></strong>
        </div>
        <div style="text-align: center;">
            <table style="width: 8in;border: 1px solid black;border-collapse: collapse;">
                    <tr>
                        <td rowspan="2" colspan="2" style="text-align: center;border: 1px solid black;border-collapse: collapse;">Department</td>
                        <td rowspan="2" style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{ $office ?? "none" }}</td>
                        <td width="7%" rowspan="2"style="vertical-align:top;border: 1px solid black;border-collapse: collapse;">Section:</td>
                        <td rowspan="2" style="border: 1px solid black;border-collapse: collapse;width:9rem"></td>
                        <td style="border: 1px solid black;border-collapse: collapse;">PR No.:</td>
                        <td colspan="2" style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{ $pr_no ?? "none" }}</td>
                    </tr>
                    <tr>
                        
                        
                        
                        
                        <td style="border: 1px solid black;border-collapse: collapse;">PR Date.:</td>
                        <td  colspan="2" style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{ $pr_date ?? "none" }}</td>
                    </tr>
                    <tr>
                        <th width="6.5%" style="text-align: center;border: 1px solid black;border-collapse: collapse;">App Line Item No.</th>
                        <th width="6.5%"  style="text-align: center;border: 1px solid black;border-collapse: collapse;">Unit of Measure</th>
                        <th width="56%" colspan="3" style="text-align: center;border: 1px solid black;border-collapse: collapse;">Item Description</th>
                        <th width="7%" style="text-align: center;border: 1px solid black;border-collapse: collapse;">Qty</th>
                        <th width="12%" style="text-align: center;border: 1px solid black;border-collapse: collapse;">Estimated Unit Cost</th>
                        <th width="12%" style="text-align: center;border: 1px solid black;border-collapse: collapse;">Estimated Total Cost</th>
                    </tr>
                    <tr>
                        <td colspan="5" style="border: 1px solid black;border-collapse: collapse;">
                            Please provide correct and accurate information required in this form. Accomplish this form in (4) copies.
                        </td>
                        <td style="border: 1px solid black;border-collapse: collapse;"></td>
                        <td style="border: 1px solid black;border-collapse: collapse;"></td>
                        <td style="border: 1px solid black;border-collapse: collapse;"></td>
                    </tr>
                    @foreach($PurchaseRequestItem as $index => $purchaseRequestitem)
                        <tr>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{ $index+1 }}</td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{ $purchaseRequestitem->unit_measure }}</td>
                            <td colspan="3" style="text-align: left;border: 1px solid black;border-collapse: collapse;">{{ $purchaseRequestitem->item_description }}</td>
                            <td style="text-align: center;border: 1px solid black;border-collapse: collapse;">{{ $purchaseRequestitem->qty }}</td>
                            <td style="text-align: right;border: 1px solid black;border-collapse: collapse;">{{ number_format($purchaseRequestitem->estimated_cost, 2, '.', ',') ?? '0' }}</td>
                            <td style="text-align: right;border: 1px solid black;border-collapse: collapse;">
                                {{ number_format($purchaseRequestitem->estimated_cost*$purchaseRequestitem->qty, 2, '.', ',') ?? '0' }}
                                <?php
                                    $total_all+=$purchaseRequestitem->estimated_cost*$purchaseRequestitem->qty;
                                ?>
                            </td>
                        </tr>
                    @endforeach
                    @for ($list_size = 1; $list_size <= 25-count($PurchaseRequestItem); $list_size++)
                        <tr>
                            <td style="height: 15px;border: 1px solid black;border-collapse: collapse;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                            <td colspan="3" style="border: 1px solid black;border-collapse: collapse;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                            <td style="border: 1px solid black;border-collapse: collapse;"></td>
                        </tr>
                    @endfor
                    
                    <tr>
                        <th colspan="8" style="text-align: left;padding-left:.65in;height: 20px;border: 1px solid black;border-collapse: collapse;"><span><i>  </i></span></th>
                    </tr>
                    <tr>
                        <th colspan="8" style="text-align: left;padding-left:1.10in;height: 20px;border: 1px solid black;border-collapse: collapse;">
                            <span>
                                <i>
                                    {{--  --}}
                                </i>
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="8" style="text-align: left;padding-left:1.10in;height: 20px;border: 1px solid black;border-collapse: collapse;">
                            <span>
                                <i>
                                    {{--  --}}
                                </i>
                            </span>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="7" style="text-align: right;padding-right:0.30in;height: 35px;border: 1px solid black;border-collapse: collapse;">
                            Total
                        </th>
                        <th style="text-align: center;border: 1px solid black;border-collapse: collapse;">
                            {{ number_format($total_all, 2, '.', ',') ?? '0' }}
                        </th>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: left;height: 35px;border: 1px solid black;border-collapse: collapse;">
                            <div style="width: 0.5in;float:left">
                                <strong>Purpose:</strong>
                            </div>
                            <div style="width: 7in;float:right">
                                {{ $purpose ?? "none" }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8" style="text-align: left;height: 110px;vertical-align:top;border: 1px solid black;border-collapse: collapse;">
                            <div style="line-height: 10%;margin-top:10px">
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
                        <td colspan="8" style="text-align: left;height: 110px;vertical-align:top;border: 1px solid black;border-collapse: collapse;">
                            <div style="line-height: 30%;margin-top:10px">
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
                        <td colspan="2" style="text-align: left;border: 1px solid black;border-collapse: collapse;">
                            <br><br><br>
                            Signature:
                            <br>
                            Printed Name:
                            <br>
                            Designation: 
                        </td>
                        <td colspan="6" style="border: 1px solid black;border-collapse: collapse;">
                            <div style="width: 3in;float:left">
                                Requested by: 
                                    <br><br><br><br>
                                    <div style="text-align: center;">
                                        <strong>{{ $UserName ?? "none"}}</strong>
                                        <br>
                                        {{ $Office ?? "none"}}
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






        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" wire:click="closeViewPuchaseRequestForm">Close</button>
        </div>
</div>
