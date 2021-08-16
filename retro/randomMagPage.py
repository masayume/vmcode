#! /usr/bin/env python
import os, random
import subprocess
import urllib

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
        html_mode(dirs)


# program ends here

def html_mode(d):

    print("NEW html mode")

    # get data
    mdir, mag, page, pages = randomMagazineAndPage(d)
    # compose URL (urlencode)
    url     = "/inspire/retro/" + urllib.quote_plus(mdir) + "/" + urllib.quote_plus(mag) + "#page=" + str(page)
    # print URL
    urlstring   = "<a href=" + url + ">random page of random Retro magazine</a>"
    print(urlstring)


    f = open("/var/www/html/retro/randompages.htm", "w")
    f.write(urlstring)
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
    pdfinfo = subprocess.check_output(command, shell=True)

    ## parsing text output, find number of pages 
    pages   = 0

    pdflines = pdfinfo.split('\n')
    for l in pdflines:
        line    = l.split(':')
        if (line[0] == "Pages"): 
            pages = line[1].strip()

    # print(rndfile)
    # print(pages)

    from random import randrange
    rndpage     = randrange(int(pages))

    return pdfdir, rndfile, rndpage, pages


if __name__ == '__main__':
    main()
