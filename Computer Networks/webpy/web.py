#!/usr/bin/env python
import requests
from collections import namedtuple
from time import sleep
import datetime


def citireFisier(fisier):
        objFisier = open(fisier, "r")
        arr = objFisier.read().splitlines()
        objFisier.close()
        return arr

WebsiteStatus = namedtuple('WebsiteStatus', ['status_code', 'reason'])
websites = citireFisier('lista-servere-web.txt')

def get_status(site):
    try:
        response = requests.head(site, timeout=5)
        status_code = response.status_code
        reason = response.reason
    except requests.exceptions.ConnectionError:
        status_code = '000'
        reason = 'ConnectionError'
    website_status = WebsiteStatus(status_code, reason)
    return website_status

n = 1 #create infinite loop
while n > 0:
    ora = datetime.datetime.now()
    stareSite = ''

    print('La ora ', ora.hour, ':', ora.minute, ' starea serverelor web este:')
    for name in websites:
        site = 'http://{}'.format(name)
        website_status = get_status(site)

        if(website_status.status_code == 404):
            print("{0:30} {1:10}"
                .format(site, "INACTIV"))
        else:
            print("{0:30} {1:10}"
                .format(site, "ACTIV"))
    sleep(60)