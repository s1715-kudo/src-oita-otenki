#!/usr/bin/python
# -*- coding: utf-8 -*-
import sys
import send

from_addr = 'oita.otenki@gmail.com'
to_addr = sys.argv[1]
subject = 'おてんき！会員登録　登録完了メール'
body = 'このメールアドレスで「おてんき！」の会員登録が完了しました。'
send.mail(from_addr,to_addr,subject,body)