# !/usr/bin/python
# -*-coding:utf-8-*-
import sys
import chilkat
import requests

from bs4 import BeautifulSoup
req = requests.Session()
def get_title(url):
    headers = {"User-Agent": "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36"}
    try:
        res = req.get(url, headers=headers)
        html = res.content.decode("utf-8")
        soup = BeautifulSoup(html, 'lxml')
        print("[+]"+soup.find('title').get_text())
        if res.status_code == 200:
            return soup.find('title').get_text()
        elif res.status_code == 404:
            return "404"
    except Exception as e:
        print(e)

mht = chilkat.CkMht()

success = mht.UnlockComponent("Anything for 30-day trial")
if (success != True):
    print(mht.lastErrorText())
    sys.exit()

base_url = "https://xz.aliyun.com/t/"
base_path = "./tmp/"

if __name__ == '__main__':
    '''
    print("Please Input Web Page Index: ")
    start = input("please input web page index: ")
    print("start >> " + start)
    print("end   >> " + end)
    print(start + "  " + end);
    sys.exit()
    '''
    for p in range(1, 1000):
        try:
            target_url = base_url + str(p)
            if get_title(target_url)== "404":
                continue
            save_path = base_path + str(get_title(target_url)).replace("?","_") + '.mht'
            print("target_url   ->  " + target_url)
            print(save_path)
            success = mht.GetAndSaveMHT(target_url, save_path)
            if (success != True):
                print(mht.lastErrorText())
                sys.exit()
            p = p + 1
        except Exception as e:
            print("[-]Error:"+target_url)

    print("done")