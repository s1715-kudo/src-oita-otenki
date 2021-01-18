#!/usr/bin/python
# -*- coding: utf-8 -*-
import sys
import send

from_addr = 'oita.otenki@gmail.com'
to_addr = sys.argv[1]
securityid = sys.argv[2]
subject = 'おてんき！会員登録　確認メール'
body = 'このメールアドレスで「おてんき！」の会員登録されました。次のURLを開いて登録を完了してください。\r\n https://oita-otenki.herokuapp.com/confirmmail.php?mail='+to_addr+'&id='+securityid
send.mail(from_addr,to_addr,subject,body)