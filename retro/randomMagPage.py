#! /usr/bin/env python
import os, random
import subprocess
import urllib
try:
    from urllib.parse import urlparse
except ImportError:
     from urlparse import urlparse

# *********** mode ************* 
# available: cli (command line), html (return clickable url list)
mode    = 'html'     

def main():
    dirs    = []
    dirs.append('EGM')
    dirs.append('CVG/1981')
    dirs.append('FAMITSU.jp')
    dirs.append('GAMEST.jp')
    dirs.append('electronic GAMES')
    dirs.append('The Games Machine UK')
    dirs.append('MSX Magazine.jp')
    dirs.append('Neo Geo Freak.jp')
    dirs.append('NG NAMCO COMMUNITY MAGAZINE.jp')
    dirs.append('EDGE MAGAZINE')
    dirs.append('retrogamer UK')
    dirs.append('The One')
    dirs.append('Your Sinclair')

    if (mode == 'cli'):
        mdir, mag, page, pages = randomMagazineAndPage(dirs)
        print(mdir)
        print(mag)
        msg     = "" + str(page) + " of " + str(pages)
        print(msg)
    else:
        html_mode(dirs, 40)


# program ends here

def html_mode(d, n=1):

    print("NEW html mode")
    urlstrings = ""

    for x in range(n):
        # get data
        mdir, mag, page, pages = randomMagazineAndPage(d)
        # compose URL (urlencode)
#        url     = "/inspire/retro/" + urllib.quote_plus(mdir) + "/" + urllib.quote_plus(mag) + "#page=" + str(page)
        url     = "/inspire/retro/" + mdir.replace(" ", "%20") + "/" + mag.replace(" ", "%20") + "#page=" + str(page)
        # print URL
        urlstrings += "\n<li><a href=" + url + "> Page " + str(page) + " of " + urllib.quote_plus(mag) + "</a></li>"
        # print(urlstrings)


    f = open("/var/www/html/retro/randompages.htm", "w")
    f.write(urlstrings)
    f.close()

def randomMagazineAndPage(d):
    pdfdir  = random.choice(d)  # pdfdir = random dir
    basedir = '/home/masayume/inspire/retro/'
    fulldir = basedir + pdfdir

    rndfile = random.choice(os.listdir(fulldir)) 
    # print(rndfile)

    command = "pdfinfo \"" + fulldir + "/" + rndfile + "\" "
    # print(command)

    ## pdfinfo = os.system(command)
    pdfinfo = str(subprocess.check_output(command, shell=True))

    ## parsing text output, find number of pages 
    pages   = 0

    pdflines = pdfinfo.split('\n')
    for l in pdflines:
        line    = l.split(':')
        if (line[0] == "Pages"): 
            pages = line[1].strip()

    print(rndfile)
    print(pages)

    from random import randrange
    rndpage     = randrange(int(pages))

    return pdfdir, rndfile, rndpage, pages


if __name__ == '__main__':
    main()
