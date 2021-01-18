#!/usr/bin/python
# -*- coding: utf-8 -*-
import smtplib
from email.mime.text import MIMEText
from email.utils import formatdate
from email.header import Header
from email import charset

def mail(from_addr,to_addr,subject,body):
	send_mail(from_addr,to_addr,create_message(from_addr,to_addr,subject,body))
	
def send_mail(from_addr,to_addr,body_msg):
	smtpobj=smtplib.SMTP('smtp.gmail.com',587)
	smtpobj.ehlo()
	smtpobj.starttls()
	smtpobj.ehlo()
	smtpobj.login(from_addr,"2020oitaaw1")
	smtpobj.sendmail(from_addr, to_addr, body_msg.as_string())
	smtpobj.close()
	
def create_message(from_addr,to_addr,subject,body):
	msg=MIMEText(body)
	msg['Subject']=subject
	msg['From']=from_addr
	msg['To']=to_addr
	msg['Date']=formatdate()
	return msg
