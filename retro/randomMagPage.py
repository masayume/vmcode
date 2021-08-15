#! /usr/bin/env python
import os, random
import subprocess
import re 

def main():
    dirs    = []
    dirs.append('/home/masayume/inspire/retro/EGM/')
    dirs.append('/home/masayume/inspire/retro/CVG/1981/')
    dirs.append('/home/masayume/inspire/retro/FAMITSU.jp/')
    dirs.append('/home/masayume/inspire/retro/GAMEST.jp/')
    dirs.append('/home/masayume/inspire/retro/electronic GAMES/')
    dirs.append('/home/masayume/inspire/retro/The Games Machine UK/')
    dirs.append('/home/masayume/inspire/retro/MSX Magazine.jp/')
    dirs.append('/home/masayume/inspire/retro/Neo Geo Freak.jp/')
    dirs.append('/home/masayume/inspire/retro/NG NAMCO COMMUNITY MAGAZINE.jp/')
    dirs.append('/home/masayume/inspire/retro/retro EDGE MAGAZINE/')
    dirs.append('/home/masayume/inspire/retro/retrogamer UK/')
    dirs.append('/home/masayume/inspire/retro/The One/')
    dirs.append('/home/masayume/inspire/retro/Your Sinclair/')

    mag, pages = randomMagazineAndPage(dirs)
    print(mag)
    print(pages)

def randomMagazineAndPage(d):
    pdfdir  = random.choice(d)  # pdfdir = random dir

    rndfile = random.choice(os.listdir(pdfdir)) 
    # print(rndfile)

    command = "pdfinfo \"" + pdfdir + rndfile + "\" "
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
    return rndfile,pages

if __name__ == '__main__':
    main()
