<%@ Page Language="C#" AutoEventWireup="true" CodeFile="CREDITREFERENCEFORM.aspx.cs" Inherits="CREDITREFERENCEFORM" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head id="Head1" runat="server">
    <title>CREDIT REFERENCE FORM</title>    
    <link href="main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="popcalendar.js"></script>    
</head>
<body>
    <form id="form1" runat="server">
    <div>
    <table width="930" height="371">
    <tr>
    <td width="100" style="background:#CCCCCC" height="371"></td>
    <td width="750"><table width="758" height="471"  align="center" cellpadding="0" cellspacing="0" border="0">
          
          <tr>
                <td  align="center" colspan="4">
                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="758" height="210">
                <param name="movie" value="top_animation.swf">
                <param name="quality" value="high">
                <embed src="top_animation.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="758" height="210"></embed>
              </object>
  </td>
                
            </tr>
            
            <tr>
<td colspan="4" bgcolor="#CFDEF5" align="right">
<a href="download.htm">
    <img src="images/icon1.jpg" width="15" height="13" border="0" alt='Downloads' style="cursor:HAND;"></a>    
   &nbsp;&nbsp;&nbsp; <img src="images/icon2.jpg" width="15" height="12" alt='Print the page' onClick="window.print();" style="cursor:HAND;">
   
    </td>
</tr>





              <tr>               
                <td  colspan="4" style="height: 15px; width: 162px;" align="left">
                   </td>
               
            </tr>
          <tr>
          <td colspan="4">
          <table>
          <tr>          
          <td><img src="images/bullet.JPG" width="20" height="18" ></td>               
         <td align="left" class="txt4"><a name="1"> <span class="txt4">Credit Reference Form</span></a></td> 
          </tr>
          </table>
          </td>                    
            </tr>
            <tr>
                <td  align="center" colspan="4">
                                <asp:Label CssClass="links" ID="lblmsg"  runat="server"  ForeColor="Red" Font-Size="Medium"></asp:Label> 
  </td>
                
            </tr>
           <tr>
                <td class="txtcaption" style="height: 28px; width: 128px; border-color:Blue" align="left">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Company Name</td>
                <td  style="height: 28px; width: 162px;" align="left">:
                    <asp:TextBox   CssClass="textbox"  ID="txtCompanyName"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox></td>
               
            </tr>
         <tr><td class="txtcaption" style="height: 21px; width: 128px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Constitution</td>         
                <td class="txtcaption" colspan="3" style="height: 21px" >:&nbsp;
                 <asp:RadioButton   ID="rdoProprietor" runat="server" GroupName="Constitution" Text="Proprietor " Checked="True"   />
                <asp:RadioButton ID="rdoIndividual" runat="server" GroupName="Constitution" Text="Individual "  TabIndex="2"  ></asp:RadioButton>               
                    <asp:RadioButton ID="rdoPartnership" runat="server" GroupName="Constitution" Text="Partnership  "    />
                <asp:RadioButton ID="rdoCompany" runat="server" GroupName="Constitution" Text="Company  "  TabIndex="2"  ></asp:RadioButton>
                </td>               
            
                
            </tr>
            <tr>
                <td class="txtcaption" style="height: 28px; width: 175px;" align="left">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proprietor / Director</td>
                <td  style="height: 28px; width: 162px;" align="left">:
                    <asp:TextBox CssClass="textbox"  ID="txtProprietor"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox></td>
               <td style="width: 100px"></td>
               <td></td>
            </tr>
                    <tr>
                <td class="txtcaption" style="height: 38px; width: 128px;">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Partner</td>
                <td  style=" height: 38px; width: 162px;" align="left">:
                                        <asp:TextBox CssClass="textbox" ID="txtPartner"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox></td>

                  <td style="width: 100px; height: 38px;"></td>
               <td style="height: 38px"></td>             
            </tr>          
             <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Person </td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                <asp:TextBox CssClass="textbox" ID="txtContactPerson"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox></td>
                  <td style="width: 100px"></td>
               <td></td>             
            </tr>          
             <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Office Address</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtOfficeAddress" TextMode="multiLine"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox></td>
           <td style="width: 100px"></td>
               <td></td>
            </tr>         
            
             <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telephone No1.</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                                        <asp:TextBox CssClass="textbox" ID="txtTelephone1"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
                   
                   </td>
                    <td style="height: 29px; width: 100px;" class="txtcaption">
                 Telephone No2.</td>
                <td  style=" height: 29px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtTelephone2"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td> 
                   
                     
                              
            </tr>              
             <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                                        <asp:TextBox CssClass="textbox" ID="txtFax"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
                   
                   </td>
                    <td style="height: 29px; width: 100px;" class="txtcaption">
                 Mobile No.</td>
                <td  style=" height: 29px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtMobile"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td> 
                   
                     
                              
            </tr>          
             <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                                        <asp:TextBox CssClass="textbox" ID="txtEmail"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox></td>

                  <td style="width: 100px"></td>
               <td></td>   
            </tr>          
             <tr>
                <td style="height: 29px; width: 175px;" class="txtcaption">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nature of Business</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                                        <asp:TextBox CssClass="textbox" ID="txtNatureofBusiness"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox></td>

                  <td style="width: 100px"></td>
               <td></td>              
            </tr> 
             <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remarks</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                                        <asp:TextBox CssClass="textbox" ID="txtRemarks" TextMode="multiLine"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox></td>
                 <td style="width: 100px"></td>
               <td></td>                
            </tr> 
             
           <tr>
                <td colspan="4">------------------------------------------------------------------------------------------------------------------------------</td>                 
            </tr> 
            <tr>
          <td colspan="4">
          <table>
          <tr>          
          <td><img src="images/bullet.JPG" width="20" height="18" ></td>               
         <td align="left" class="txt4"><a name="1"> <span class="txt4">Sales Tax Details</span></a></td> 
          </tr>
          </table>
          </td>                    
            </tr>
            
           
            
            <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;G.S.T.Number</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                                        <asp:TextBox CssClass="textbox" ID="txtGSTNumber"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox></td>
<td style="width: 100px"></td>
               <td></td>
                                
            </tr>          
             <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C.S.T.Number</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                                        <asp:TextBox CssClass="textbox" ID="txtCSTNumber"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox></td>
<td style="width: 100px"></td>
               <td></td>
                               
            </tr> 
           <tr>
                <td colspan="4">------------------------------------------------------------------------------------------------------------------------------</td>                 
            </tr> 
           
            
            <tr>
            <td colspan="4">
          <table>
          <tr>          
          <td><img src="images/bullet.JPG" width="20" height="18" ></td>               
         <td align="left" class="txt4"><a name="1"> <span class="txt4">Bank Details Reference Form</span></a></td> 
          </tr>
          </table>
          </td>                    
            </tr>
            
            <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtName"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                 Branch</td>
                <td  style=" height: 29px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtBranch"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                     
                        
            </tr>          
            <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A/C No.</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtACNo"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                 A/C Opening Date</td>
                <td  style=" height: 29px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtOpeningDate"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
                 <img id="img1" alt="Calendar" onclick="popUpCalendar(this, document.all.<%=txtOpeningDate.ClientID%>, 'mm/dd/yyyy', 0, 0);"
                src="Images/SmallCalendar.gif" />
               </td>                 
            </tr>  
            <tr>
                <td colspan="4">------------------------------------------------------------------------------------------------------------------------------</td>                 
            </tr>
             
            <tr>
            <td colspan="4">
          <table>
          <tr>          
          <td><img src="images/bullet.JPG" width="20" height="18" ></td>               
         <td align="left" class="txt4"><a name="1"> <span class="txt4">Trade References</span></a></td> 
          </tr>
          </table>
          </td>                    
            </tr>
            
             <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supplier Name</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtSupplierName"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;">
                 <span style="color: #ff3333"></span></td>
                <td  style=" height: 29px;" align="left">
                    &nbsp;</td>
                     
                        
            </tr>   
              <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Person</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtContactPerson1"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                 Contact Nos.</td>
                <td  style=" height: 29px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtContactNos"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                     
                        
            </tr>
                 <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Credit Limit</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtCreditLimit"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                 Credit Days</td>
                <td  style=" height: 29px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtCreditDays"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>                   
                        
            </tr>
            <tr>
                <td colspan="4">------------------------------------------------------------------------------------------------------------------------------</td>                 
            </tr>        
            <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supplier Name</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtSupplierName1"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;">
                 <span style="color: #ff3333"></span></td>
                <td  style=" height: 29px;" align="left"></td>
                     
                        
            </tr>   
              <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Person</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtContactPerson2"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                 Contact Nos.</td>
                <td  style=" height: 29px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtContactNos2"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                     
                        
            </tr>
                 <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Credit Limit</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtCreditLimit1"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                 Credit Days</td>
                <td  style=" height: 29px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtCreditDays1"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>                   
                        
            </tr> 
           <tr>
                <td colspan="4">------------------------------------------------------------------------------------------------------------------------------</td>                 
            </tr>     
            <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supplier Name</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtSupplierName3"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;">
                 <span style="color: #ff3333"></span></td>
                <td  style=" height: 29px;" align="left">
               </td>
                     
                        
            </tr>   
              <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Person</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtContactPerson3"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                 Contact Nos.</td>
                <td  style=" height: 29px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtContactNos3"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                     
                        
            </tr>
                 <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Credit Limit</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtCreditLimit3"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                 Credit Days</td>
                <td  style=" height: 29px;" align="left">:
                 <asp:TextBox CssClass="textbox" ID="txtCreditDays3"  runat="server" MaxLength="50" Width="150px" TabIndex="3"></asp:TextBox>
               </td>    
                        
            </tr>  
            
           <tr>
                <td colspan="4">------------------------------------------------------------------------------------------------------------------------------</td>                 
            </tr> 
             <tr>
            <td colspan="4">
          <table>
          <tr>          
          <td><img src="images/bullet.JPG" width="20" height="18" ></td>               
         <td align="left" class="txt4"><a name="1"> <span class="txt4">For Internal Use Only</span></a></td> 
          </tr>
          </table>
          </td>                    
            </tr>
             
                 <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Credit Limit</td>
                <td  style=" height: 29px; width: 162px;" align="left">: -----------------------
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                Credit Period</td>
                <td  style=" height: 29px;" align="left">: -----------------------
               </td>                         
            </tr>  
            <tr>                
                <td colspan="4" class="txtcaption">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Special Instructions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;:Reseller ------- &nbsp;SI ------ &nbsp;Enduser -------  &nbsp;Retailer ------- &nbsp;Outstation party ---- &nbsp; OEM  ----
                </td>                                  
            </tr>  
            
            <tr>
                <td style="height: 29px; width: 175px;" class="txtcaption">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Marketing Executive</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
               -----------------------
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                Signature</td>
                <td  style=" height: 29px;" align="left">: -----------------------
               </td>                         
            </tr>    
            <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Director</td>
                <td  style=" height: 29px; width: 162px;" align="left">:
               -----------------------
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                Signature</td>
                <td  style=" height: 29px;" align="left">: -----------------------</td>                         
            </tr>    
            <tr>
                <td style="height: 29px; width: 175px;" class="txtcaption">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A/C opened in the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;systems by</td>
                <td  style=" height: 29px; width: 162px;" align="left">: -----------------------
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                Entered in the Co. Database by</td>
                <td  style=" height: 29px;" align="left">: -----------------------
               </td>                         
            </tr>
             <tr>
                <td colspan="4">------------------------------------------------------------------------------------------------------------------------------</td>                 
            </tr>
            <tr>
                <td style="height: 29px; width: 128px;">
                   </td>
                <td  style=" height: 29px; width: 182px;" align="left">&nbsp;
                                         <asp:Button    ToolTip="Please click this button  for sending email"  CssClass="txtcaption"  runat="server" ID="btnSendAmil" Text="SendMail" OnClick="btnSendAmil_Click" />
                                         <asp:Button  ToolTip="Please click this button for cancel"   CssClass="txtcaption" runat="server" ID="btncancel" Text="Cancel" Width="70px" OnClick="btncancel_Click1" />
                                         
                                         </td>

                               
            </tr>   
            <tr>
                <td style="height: 29px; width: 128px;" class="txtcaption">
                 </td>
                <td  style=" height: 29px; width: 162px;" align="left">
               </td>
                 <td style="height: 29px; width: 100px;" class="txtcaption">
                </td>
                <td  style=" height: 29px;" align="right"><a href="#1"><span class="about"> Back To Top </span></a>
               </td>                         
            </tr>      
               
               <tr>
                <td colspan="4" bgcolor="#3B5E92" height="25" >
                <table width="758"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="37" height="19" class="Projectgallery"><div align="center"><a href="index.htm"><span class="Projectgallery">HOME</span></a></div></td>
                <td width="7" height="16" class="Projectgallery"><div align="center">|</div></td>
                <td width="60" class="Projectgallery"><div align="center"><a href="about.htm"><span class="Projectgallery">ABOUT US</span></a> </div></td>
                <td width="7" height="16" class="Projectgallery"><div align="center">|</div></td>
                <td width="88" class="Projectgallery"><div align="center"><a href="achievements.htm"><span class="Projectgallery">ACHIEVEMENTS</span></a></div></td>
                <td width="7" height="16" class="Projectgallery"><div align="center">|</div></td>
                <td width="67" class="Projectgallery"><div align="center"><a href="product.htm"><span class="Projectgallery">PRODUCTS</span></a></div></td>
                <td width="7" class="Projectgallery"><div align="center">|</div></td>
                <td width="84" class="Projectgallery"><div align="center"><a href="arrivals.htm"><span class="Projectgallery">NEW ARRIVALS</span></a> </div></td>
                <td width="8" class="Projectgallery"><div align="center">|</div></td>
                <td width="53" class="Projectgallery"><div align="center"><a href="imports.htm"><span class="Projectgallery">IMPORTS</span></a></div></td>
                <td width="8" class="Projectgallery"><div align="center">|</div></td>
                <td width="99" class="Projectgallery"><div align="center"><a href="service.htm"><span class="Projectgallery">SERVICE CENTRES</span></a></div></td>
                <td width="7" class="Projectgallery"><div align="center">|</div></td>
                <td width="61" class="Projectgallery"><div align="center"><a href="clientele.htm"><span class="Projectgallery">CLIENTELE</span></a></div></td>
                <td width="7" class="Projectgallery"><div align="center">|</div></td>
                <td width="56" class="Projectgallery"><div align="center"><a href="contact.htm"><span class="Projectgallery">CONTACT</span></a></div></td>
                <td width="7" class="Projectgallery"><div align="center">|</div></td>
                <td width="88" class="Projectgallery"><div align="center"><a href="Enquiry.htm"><span class="Projectgallery">ENQUIRY FORM</span></a></div></td>
              </tr>
            </table>
                 </td>                                       
            </tr>  
            <tr>
               <td   colspan="4" bgcolor="#3B5E92">
                <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td class="Projectgallery">Design by <a href="http://www.auracommunication.com" target="_blank"><span class="Projectgallery">Aura Communication Pvt. Ltd.</span></a> </td>
                      <td class="Projectgallery"><div align="right">Best viewed at 1024 x 768</div></td>
                      <td class="Projectgallery">&nbsp;</td>
                    </tr>
                </table>
                 </td>                                       
            </tr>        
        </table></td>
    <td width="100" style="background:#CCCCCC" height="371"></td>
    </tr>
    </table>  
    </div>
    </form>
</body>
</html>
