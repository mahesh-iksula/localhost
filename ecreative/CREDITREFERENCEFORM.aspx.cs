using System;
using System.Data;
using System.Configuration;
using System.Collections;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using System.Data.OleDb;
using System.Net.Mail;
using System.IO;
using System.Reflection;
using ASPEMAILLib;

public partial class CREDITREFERENCEFORM : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!IsPostBack)
        { 
        
        }

    }
    
    protected void btnSendAmil_Click(object sender, EventArgs e)
    {
        string FromAddress = "hariom@tasaa.com";
        string ToAddress = "sales@ecreativeindia.com";
        String strMessage = "CREDITREFERENCEFORM Email Testing";
        MailMessage mm = new MailMessage(FromAddress, ToAddress);
        mm.Subject = "Hello Test";
        mm.Body = strMessage;
        mm.IsBodyHtml = true;        
        SmtpClient smtp = new SmtpClient();
        try
        {
            smtp.Send(mm);
            lblmsg.Text = "Mail Sent Successfully!!";
        }
        catch (Exception ex)
        {
            lblmsg.Text = "Error on Mail Sending!!";
        }   
    }
    public void Clear()
    {
        txtACNo.Text = "";
        txtBranch.Text = "";
        txtCompanyName.Text = "";
        txtContactNos.Text = "";
        txtContactNos2.Text = "";
        txtContactNos3.Text = "";
        txtContactPerson.Text = "";
        txtContactPerson1.Text = "";
        txtContactPerson2.Text = "";
        txtContactPerson3.Text = "";
        txtCreditDays.Text = "";
        txtCreditDays1.Text = "";
        txtCreditDays3.Text = "";
        txtCreditLimit.Text = "";
        txtCreditLimit1.Text = "";
        txtCreditLimit3.Text = "";
        txtCSTNumber.Text = "";
        txtEmail.Text = "";
        txtFax.Text = "";
        txtGSTNumber.Text = "";
        txtMobile.Text = "";
        txtName.Text = "";
        txtNatureofBusiness.Text = "";
        txtOfficeAddress.Text = "";
        txtOpeningDate.Text = "";
        txtPartner.Text = "";
        txtProprietor.Text = "";
        txtRemarks.Text = "";
        txtSupplierName.Text = "";
        txtSupplierName1.Text = "";
        txtSupplierName3.Text = "";
        txtTelephone1.Text = "";
        txtTelephone2.Text = "";
        rdoCompany.Checked = false;
        rdoIndividual.Checked = false;
        rdoPartnership.Checked = false;
        rdoProprietor.Checked = true;
    }
    protected void btncancel_Click1(object sender, EventArgs e)
    {
        Clear();
    }
}
