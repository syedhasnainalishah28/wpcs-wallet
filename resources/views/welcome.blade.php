<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="WPCS Wallet – Secure digital wallet for instant deposits, withdrawals and seamless transactions worldwide.">
    <title>WPCS Wallet – Secure Digital Wallet</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        crossorigin="anonymous">

    <!-- AOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        :root {
            --pri: #6C3FF5;
            --pri-l: #8B63FF;
            --pri-d: #4A1ED8;
            --acc: #F5A623;
            --acc-l: #FFD166;
            --grn: #06D6A0;
            --pnk: #FF4D9E;
            --bg: #08080F;
            --card: #10102A;
            --glass: rgba(255, 255, 255, .04);
            --bdr: rgba(255, 255, 255, .09);
            --t1: #FFFFFF;
            --t2: #A8B0C8;
            --t3: #5E6280;
            --gb: linear-gradient(135deg, #6C3FF5, #8B63FF);
            --ga: linear-gradient(135deg, #F5A623, #FFD166);
            --gc: linear-gradient(135deg, rgba(108, 63, 245, .13), rgba(245, 166, 35, .07));
        }

        html {
            scroll-behavior: smooth
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            color: var(--t1);
            overflow-x: hidden;
            line-height: 1.6
        }

        ::-webkit-scrollbar {
            width: 5px
        }

        ::-webkit-scrollbar-track {
            background: var(--bg)
        }

        ::-webkit-scrollbar-thumb {
            background: var(--pri);
            border-radius: 3px
        }

        /* PARTICLES */
        #ptcl {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden
        }

        .pt {
            position: absolute;
            border-radius: 50%;
            opacity: 0;
            animation: ptUp linear infinite
        }

        @keyframes ptUp {
            0% {
                transform: translateY(105vh) scale(0);
                opacity: 0
            }

            10% {
                opacity: .45
            }

            90% {
                opacity: .12
            }

            100% {
                transform: translateY(-10vh) scale(1);
                opacity: 0
            }
        }

        /* ===== NAVBAR ===== */
        #nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 5%;
            background: rgba(8, 8, 15, .82);
            backdrop-filter: blur(22px);
            border-bottom: 1px solid var(--bdr);
            transition: all .3s;
        }

        #nav.sc {
            padding: 11px 5%;
            background: rgba(8, 8, 15, .97);
            box-shadow: 0 4px 32px rgba(108, 63, 245, .18)
        }

        .nl {
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
            flex-shrink: 0
        }

        .ni {
            width: 42px;
            height: 42px;
            background: var(--gb);
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 19px;
            color: #fff;
            box-shadow: 0 4px 18px rgba(108, 63, 245, .5);
            transition: .3s
        }

        .nl:hover .ni {
            transform: rotate(10deg) scale(1.1)
        }

        .nt {
            font-size: 20px;
            font-weight: 800;
            background: var(--gb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -.5px
        }

        .nlinks {
            display: flex;
            align-items: center;
            gap: 30px;
            list-style: none
        }

        .nlinks a {
            color: var(--t2);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: .3s;
            position: relative
        }

        .nlinks a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--gb);
            transform: scaleX(0);
            transition: .3s
        }

        .nlinks a:hover {
            color: #fff
        }

        .nlinks a:hover::after {
            transform: scaleX(1)
        }

        .ncta {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .btn-ol {
            padding: 8px 20px;
            border: 1.5px solid var(--bdr);
            border-radius: 50px;
            color: var(--t1);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            background: transparent;
            text-decoration: none;
            transition: .3s;
            font-family: inherit
        }

        .btn-ol:hover {
            border-color: var(--pri-l);
            color: var(--pri-l);
            background: rgba(108, 63, 245, .1)
        }

        .btn-fl {
            padding: 8px 22px;
            background: var(--gb);
            border: none;
            border-radius: 50px;
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 4px 18px rgba(108, 63, 245, .45);
            transition: .3s;
            font-family: inherit
        }

        .btn-fl:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(108, 63, 245, .65)
        }

        /* Hamburger */
        .hbg {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 6px;
            z-index: 1001;
            background: none;
            border: none
        }

        .hbg span {
            display: block;
            width: 24px;
            height: 2px;
            background: #fff;
            border-radius: 2px;
            transition: .3s
        }

        .hbg.x span:nth-child(1) {
            transform: translateY(7px) rotate(45deg)
        }

        .hbg.x span:nth-child(2) {
            opacity: 0
        }

        .hbg.x span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg)
        }

        /* Mobile Drawer */
        .mdrawer {
            position: fixed;
            top: 0;
            right: -110%;
            width: min(300px, 82vw);
            height: 100vh;
            background: #0D0D20;
            border-left: 1px solid var(--bdr);
            z-index: 999;
            display: flex;
            flex-direction: column;
            padding: 88px 28px 36px;
            gap: 0;
            transition: right .35s cubic-bezier(.4, 0, .2, 1);
            overflow-y: auto;
        }

        .mdrawer.open {
            right: 0
        }

        .moverlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .6);
            backdrop-filter: blur(3px);
            z-index: 998;
            opacity: 0;
            pointer-events: none;
            transition: .35s
        }

        .moverlay.open {
            opacity: 1;
            pointer-events: all
        }

        .mdrawer a {
            color: var(--t2);
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            padding: 15px 0;
            border-bottom: 1px solid var(--bdr);
            display: flex;
            align-items: center;
            gap: 12px;
            transition: .3s
        }

        .mdrawer a:hover {
            color: var(--pri-l)
        }

        .mdrawer a i {
            width: 18px;
            text-align: center;
            font-size: 14px;
            color: var(--pri-l)
        }

        .mbtns {
            display: flex;
            flex-direction: column;
            gap: 11px;
            margin-top: 24px
        }

        .mbtns .btn-pr,
        .mbtns .btn-ol {
            width: 100%;
            justify-content: center;
            text-align: center
        }

        /* ===== BUTTONS ===== */
        .btn-pr {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 14px 32px;
            background: var(--gb);
            border: none;
            border-radius: 50px;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
            box-shadow: 0 8px 26px rgba(108, 63, 245, .5);
            transition: .3s
        }

        .btn-pr:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 42px rgba(108, 63, 245, .7)
        }

        .btn-wa {
            background: linear-gradient(135deg, #25D366, #128C7E);
            box-shadow: 0 8px 26px rgba(37, 211, 102, .38)
        }

        .btn-wa:hover {
            box-shadow: 0 16px 42px rgba(37, 211, 102, .6)
        }

        .btn-sk {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 14px 32px;
            background: transparent;
            border: 2px solid var(--bdr);
            border-radius: 50px;
            color: #fff;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
            transition: .3s
        }

        .btn-sk:hover {
            border-color: var(--pri-l);
            background: rgba(108, 63, 245, .12);
            transform: translateY(-3px)
        }

        /* ===== HERO ===== */
        .hero {
            position: relative;
            min-height: 100svh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 110px 5% 80px;
            overflow: hidden;
            z-index: 1
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: .2;
            pointer-events: none
        }

        .o1 {
            width: 550px;
            height: 550px;
            background: var(--pri);
            top: -140px;
            left: -140px;
            animation: od 9s ease-in-out infinite
        }

        .o2 {
            width: 370px;
            height: 370px;
            background: var(--acc);
            bottom: -80px;
            right: -80px;
            animation: od 11s ease-in-out infinite reverse
        }

        .o3 {
            width: 250px;
            height: 250px;
            background: var(--pnk);
            top: 40%;
            right: 5%;
            animation: od 13s ease-in-out infinite
        }

        @keyframes od {

            0%,
            100% {
                transform: translate(0, 0) scale(1)
            }

            33% {
                transform: translate(26px, -26px) scale(1.05)
            }

            66% {
                transform: translate(-16px, 16px) scale(.96)
            }
        }

        .hi {
            width: 100%;
            max-width: 1080px;
            margin: 0 auto
        }

        .hbadge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(108, 63, 245, .13);
            border: 1px solid rgba(108, 63, 245, .3);
            border-radius: 50px;
            padding: 7px 18px;
            font-size: 12px;
            font-weight: 600;
            color: var(--pri-l);
            margin-bottom: 24px
        }

        .ldot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--grn);
            animation: bl 2s ease infinite
        }

        @keyframes bl {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .4
            }
        }

        .htitle {
            font-size: clamp(38px, 6.5vw, 84px);
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -2px;
            margin-bottom: 20px
        }

        .htitle .t1 {
            display: block;
            color: #fff
        }

        .htitle .t2 {
            display: block;
            background: linear-gradient(135deg, #6C3FF5, #F5A623, #FF4D9E);
            background-size: 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gs 4s ease infinite
        }

        @keyframes gs {
            0% {
                background-position: 0%
            }

            50% {
                background-position: 100%
            }

            100% {
                background-position: 0%
            }
        }

        .hsub {
            font-size: clamp(15px, 2vw, 18px);
            color: var(--t2);
            max-width: 560px;
            margin: 0 auto 42px;
            line-height: 1.75
        }

        .bgrp {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
            justify-content: center;
            margin-bottom: 60px
        }

        .hstats {
            display: flex;
            flex-wrap: wrap;
            gap: 36px;
            justify-content: center
        }

        .si {
            text-align: center
        }

        .sn {
            font-size: 32px;
            font-weight: 900;
            background: var(--gb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
            line-height: 1
        }

        .sl {
            font-size: 12px;
            color: var(--t3);
            font-weight: 500;
            margin-top: 4px;
            display: block
        }

        .sdv {
            width: 1px;
            height: 42px;
            background: var(--bdr);
            align-self: center
        }

        /* Wallet card */
        .hvis {
            margin-top: 68px;
            display: flex;
            justify-content: center
        }

        .wcard {
            position: relative;
            width: min(360px, 88vw);
            background: linear-gradient(135deg, #1A1040, #2A1870);
            border-radius: 24px;
            padding: 28px;
            border: 1px solid rgba(108, 63, 245, .26);
            box-shadow: 0 40px 90px rgba(0, 0, 0, .6), 0 0 55px rgba(108, 63, 245, .2);
            animation: cf 6s ease-in-out infinite
        }

        @keyframes cf {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-13px)
            }
        }

        .wct {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 26px
        }

        .wchip {
            width: 40px;
            height: 30px;
            background: var(--ga);
            border-radius: 6px;
            display: grid;
            place-items: center;
            font-size: 15px;
            color: var(--bg)
        }

        .wnet {
            font-size: 11px;
            color: rgba(255, 255, 255, .4);
            font-weight: 600;
            letter-spacing: 1px
        }

        .wbl-lbl {
            font-size: 11px;
            color: rgba(255, 255, 255, .38);
            margin-bottom: 4px
        }

        .wbal {
            font-size: 34px;
            font-weight: 800;
            color: #fff;
            letter-spacing: -1px;
            margin-bottom: 24px
        }

        .wbal sup {
            font-size: 16px;
            opacity: .6;
            vertical-align: super
        }

        .wft {
            display: flex;
            justify-content: space-between;
            align-items: flex-end
        }

        .who {
            font-size: 13px;
            font-weight: 600;
            color: rgba(255, 255, 255, .84)
        }

        .wno {
            font-size: 11px;
            color: rgba(255, 255, 255, .33);
            margin-top: 2px;
            letter-spacing: 1px
        }

        .wex-l {
            font-size: 9px;
            color: rgba(255, 255, 255, .33);
            text-align: right
        }

        .wex-v {
            font-size: 13px;
            font-weight: 600;
            color: rgba(255, 255, 255, .72);
            text-align: right
        }

        /* Floating badges */
        .fb {
            position: absolute;
            background: var(--card);
            border: 1px solid var(--bdr);
            border-radius: 13px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 9px;
            box-shadow: 0 10px 34px rgba(0, 0, 0, .4)
        }

        .fb1 {
            top: -16px;
            right: -34px;
            animation: bf 5s ease-in-out infinite
        }

        .fb2 {
            bottom: 16px;
            left: -46px;
            animation: bf 5s ease-in-out infinite -2.5s
        }

        .fb3 {
            top: 55%;
            right: -54px;
            animation: bf 5s ease-in-out infinite -.7s
        }

        @keyframes bf {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-9px)
            }
        }

        .fbi {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: grid;
            place-items: center;
            font-size: 14px;
            flex-shrink: 0
        }

        .fig {
            background: rgba(6, 214, 160, .18);
            color: var(--grn)
        }

        .fip {
            background: rgba(108, 63, 245, .18);
            color: var(--pri-l)
        }

        .fia {
            background: rgba(245, 166, 35, .18);
            color: var(--acc)
        }

        .fb strong {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #fff
        }

        .fb small {
            font-size: 10px;
            color: var(--t3)
        }

        /* ===== TRUST BAR ===== */
        .tbar {
            padding: 46px 5%;
            border-top: 1px solid var(--bdr);
            border-bottom: 1px solid var(--bdr);
            position: relative;
            z-index: 1
        }

        .tbar-in {
            max-width: 1080px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 32px
        }

        .ti {
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--t3);
            font-size: 14px;
            font-weight: 600
        }

        .ti i {
            font-size: 19px;
            color: var(--pri-l)
        }

        /* ===== SECTIONS ===== */
        section {
            position: relative;
            z-index: 1
        }

        .con {
            max-width: 1080px;
            margin: 0 auto;
            padding: 0 5%
        }

        .sh {
            text-align: center;
            margin-bottom: 52px
        }

        .stag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 700;
            color: var(--pri-l);
            text-transform: uppercase;
            letter-spacing: 2.5px;
            margin-bottom: 13px
        }

        .stag::before,
        .stag::after {
            content: '';
            width: 26px;
            height: 1px;
            background: var(--pri);
            opacity: .5
        }

        .stitle {
            font-size: clamp(26px, 4vw, 48px);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -1px;
            margin-bottom: 15px
        }

        .stitle .hl {
            background: linear-gradient(135deg, var(--pri-l), var(--acc));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        .sdesc {
            font-size: 15.5px;
            color: var(--t2);
            max-width: 520px;
            margin: 0 auto;
            line-height: 1.75
        }

        /* Icon helpers */
        .ic-p {
            background: rgba(108, 63, 245, .2);
            color: var(--pri-l)
        }

        .ic-a {
            background: rgba(245, 166, 35, .2);
            color: var(--acc)
        }

        .ic-g {
            background: rgba(6, 214, 160, .2);
            color: var(--grn)
        }

        .ic-pk {
            background: rgba(255, 77, 158, .2);
            color: var(--pnk)
        }

        .ic-b {
            background: rgba(0, 190, 255, .2);
            color: #00BEFF
        }

        .ic-o {
            background: rgba(255, 140, 0, .2);
            color: #FF8C00
        }

        /* ===== ABOUT ===== */
        .about-s {
            padding: 108px 0
        }

        .ag {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 68px;
            align-items: center
        }

        .astack {
            display: flex;
            flex-direction: column;
            gap: 13px
        }

        .acard {
            background: var(--card);
            border: 1px solid var(--bdr);
            border-radius: 17px;
            padding: 20px 24px;
            display: flex;
            align-items: flex-start;
            gap: 17px;
            transition: .4s
        }

        .acard:hover {
            border-color: rgba(108, 63, 245, .36);
            background: rgba(108, 63, 245, .07);
            transform: translateX(7px);
            box-shadow: 0 18px 50px rgba(108, 63, 245, .12)
        }

        .aci {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 20px;
            flex-shrink: 0
        }

        .acard h3 {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 4px
        }

        .acard p {
            font-size: 13px;
            color: var(--t2);
            line-height: 1.6
        }

        .at h2 {
            font-size: clamp(26px, 3.6vw, 44px);
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -1px;
            margin-bottom: 16px
        }

        .at p {
            font-size: 14.5px;
            color: var(--t2);
            line-height: 1.8;
            margin-bottom: 13px
        }

        .hlt {
            color: var(--pri-l);
            font-weight: 600
        }

        .anums {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-top: 28px
        }

        .anc {
            background: var(--glass);
            border: 1px solid var(--bdr);
            border-radius: 13px;
            padding: 17px;
            text-align: center
        }

        .anc .n {
            font-size: 28px;
            font-weight: 900;
            background: var(--ga);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block
        }

        .anc .l {
            font-size: 11px;
            color: var(--t3);
            margin-top: 3px
        }

        /* ===== FEATURES ===== */
        .feat-s {
            padding: 108px 0
        }

        .fg {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px
        }

        .fc {
            background: var(--card);
            border: 1px solid var(--bdr);
            border-radius: 20px;
            padding: 32px 26px;
            transition: .4s;
            position: relative;
            overflow: hidden
        }

        .fc::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gc);
            opacity: 0;
            transition: .4s
        }

        .fc:hover::before {
            opacity: 1
        }

        .fc:hover {
            border-color: rgba(108, 63, 245, .36);
            transform: translateY(-7px);
            box-shadow: 0 24px 62px rgba(0, 0, 0, .55), 0 0 42px rgba(108, 63, 245, .3)
        }

        .fci {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 24px;
            margin-bottom: 20px;
            position: relative;
            transition: .4s
        }

        .fc:hover .fci {
            transform: scale(1.1) rotate(5deg)
        }

        .fc h3 {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 9px;
            position: relative
        }

        .fc p {
            font-size: 13.5px;
            color: var(--t2);
            line-height: 1.7;
            position: relative
        }

        .ftag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 13px;
            font-size: 11px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 50px;
            background: rgba(108, 63, 245, .14);
            color: var(--pri-l);
            position: relative
        }

        .ftag i {
            font-size: 10px
        }

        /* ===== HOW IT WORKS ===== */
        .how-s {
            padding: 108px 0
        }

        .sw {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            position: relative
        }

        .sl2 {
            position: absolute;
            top: 39px;
            left: 11%;
            right: 11%;
            height: 2px;
            background: linear-gradient(90deg, var(--pri), var(--acc), var(--pri));
            background-size: 200%;
            animation: ls 3s linear infinite
        }

        @keyframes ls {
            0% {
                background-position: 0%
            }

            100% {
                background-position: 200%
            }
        }

        .step {
            text-align: center;
            position: relative;
            padding: 0 14px
        }

        .snum {
            width: 76px;
            height: 76px;
            background: var(--gb);
            border-radius: 50%;
            display: grid;
            place-items: center;
            margin: 0 auto 20px;
            position: relative;
            z-index: 1;
            box-shadow: 0 0 26px rgba(108, 63, 245, .46);
            transition: .4s
        }

        .step:hover .snum {
            transform: scale(1.13);
            box-shadow: 0 0 46px rgba(108, 63, 245, .78)
        }

        .snum i {
            font-size: 27px;
            color: #fff
        }

        .step h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 8px
        }

        .step p {
            font-size: 13px;
            color: var(--t2);
            line-height: 1.7
        }

        /* ===== GALLERY ===== */
        .gal-s {
            padding: 108px 0
        }

        .gg {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 17px
        }

        .gc2 {
            background: var(--card);
            border: 1px solid var(--bdr);
            border-radius: 17px;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 13px;
            position: relative;
            overflow: hidden;
            cursor: default;
            transition: .4s
        }

        .gc2.tall {
            min-height: 420px
        }

        .gc2.wide {
            grid-column: span 2
        }

        .gc2::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gc);
            opacity: 0;
            transition: .4s
        }

        .gc2:hover {
            border-color: rgba(108, 63, 245, .36);
            transform: translateY(-4px);
            box-shadow: 0 24px 62px rgba(0, 0, 0, .55)
        }

        .gc2:hover::before {
            opacity: 1
        }

        .gir {
            position: relative;
            z-index: 1;
            width: 66px;
            height: 66px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            font-size: 26px
        }

        .gc2 h4 {
            font-size: 14px;
            font-weight: 700;
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 0 12px
        }

        .gc2 span {
            font-size: 12px;
            color: var(--t3);
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 0 12px
        }

        /* ===== TESTIMONIALS ===== */
        .testi-s {
            padding: 108px 0
        }

        .tg {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px
        }

        .tc {
            background: var(--card);
            border: 1px solid var(--bdr);
            border-radius: 20px;
            padding: 28px;
            transition: .4s;
            position: relative
        }

        .tc:hover {
            border-color: rgba(108, 63, 245, .26);
            transform: translateY(-5px);
            box-shadow: 0 26px 68px rgba(0, 0, 0, .4)
        }

        .tstars {
            display: flex;
            gap: 3px;
            color: var(--acc);
            font-size: 13px;
            margin-bottom: 12px
        }

        .tq {
            font-size: 34px;
            color: var(--pri);
            opacity: .3;
            line-height: 1;
            margin-bottom: 8px;
            font-family: Georgia, serif
        }

        .tt {
            font-size: 13.5px;
            color: var(--t2);
            line-height: 1.8;
            margin-bottom: 20px;
            font-style: italic
        }

        .tau {
            display: flex;
            align-items: center;
            gap: 11px
        }

        .tav {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-size: 17px;
            font-weight: 800;
            flex-shrink: 0;
            color: #fff
        }

        .tan {
            font-size: 14px;
            font-weight: 700;
            color: #fff
        }

        .tar {
            font-size: 11px;
            color: var(--t3)
        }

        /* ===== CTA ===== */
        .cta-s {
            padding: 108px 0
        }

        .cbox {
            background: linear-gradient(135deg, rgba(108, 63, 245, .17), rgba(245, 166, 35, .08));
            border: 1px solid rgba(108, 63, 245, .26);
            border-radius: 26px;
            padding: 68px 52px;
            text-align: center;
            position: relative;
            overflow: hidden
        }

        .cbox::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at center, rgba(108, 63, 245, .12), transparent 70%)
        }

        .cbox h2 {
            font-size: clamp(26px, 4vw, 50px);
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -1.5px;
            margin-bottom: 16px;
            position: relative
        }

        .cbox p {
            font-size: 16px;
            color: var(--t2);
            max-width: 460px;
            margin: 0 auto 32px;
            line-height: 1.75;
            position: relative
        }

        .cbtns {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
            justify-content: center;
            position: relative
        }

        /* ===== FOOTER ===== */
        footer {
            background: var(--card);
            border-top: 1px solid var(--bdr);
            padding: 68px 5% 28px;
            position: relative;
            z-index: 1
        }

        .fg2 {
            max-width: 1080px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 48px;
            padding-bottom: 48px;
            border-bottom: 1px solid var(--bdr)
        }

        .fbl {
            font-size: 19px;
            font-weight: 800;
            background: var(--gb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 11px;
            display: flex;
            align-items: center;
            gap: 8px
        }

        .fbl i {
            font-size: 18px;
            -webkit-text-fill-color: var(--pri-l)
        }

        .fbd {
            font-size: 13px;
            color: var(--t2);
            line-height: 1.8;
            max-width: 260px;
            margin-bottom: 20px
        }

        .socs {
            display: flex;
            gap: 9px
        }

        .sl3 {
            width: 37px;
            height: 37px;
            border-radius: 9px;
            background: var(--glass);
            border: 1px solid var(--bdr);
            display: grid;
            place-items: center;
            text-decoration: none;
            color: var(--t2);
            font-size: 14px;
            transition: .3s
        }

        .sl3:hover {
            background: rgba(108, 63, 245, .2);
            border-color: var(--pri);
            color: var(--pri-l);
            transform: translateY(-3px)
        }

        .fcol h4 {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--t3);
            margin-bottom: 16px
        }

        .fcol ul {
            list-style: none
        }

        .fcol ul li {
            margin-bottom: 9px
        }

        .fcol ul li a {
            color: var(--t2);
            text-decoration: none;
            font-size: 13px;
            transition: .3s
        }

        .fcol ul li a:hover {
            color: var(--pri-l)
        }

        .fbot {
            max-width: 1080px;
            margin: 24px auto 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 11px
        }

        .fbot p {
            font-size: 12px;
            color: var(--t3)
        }

        .fbot a {
            color: var(--pri-l);
            text-decoration: none
        }

        /* ===== ONBOARDING ===== */
        .onboard {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: linear-gradient(160deg, #1A0050, #3B0D8C, #6C3FF5);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity .4s ease, background 1s ease;
        }

        .onboard.show {
            opacity: 1;
            pointer-events: all
        }

        .ob-skip {
            position: absolute;
            top: 24px;
            right: 24px;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .2);
            border-radius: 50px;
            padding: 8px 18px;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            display: flex;
            align-items: center;
            gap: 7px;
            transition: .3s;
            z-index: 10;
            backdrop-filter: blur(10px);
        }

        .ob-skip:hover {
            background: rgba(255, 255, 255, .22)
        }

        .ob-track-wrap {
            width: 100%;
            max-width: 480px;
            overflow: hidden;
            flex: 1;
            display: flex;
            align-items: center;
            padding-top: 40px;
        }

        .ob-track {
            display: flex;
            width: 100%;
            transform: translateX(0);
            transition: transform .45s cubic-bezier(.4, 0, .2, 1);
            cursor: grab;
            user-select: none;
        }

        .ob-slide {
            min-width: 100%;
            padding: 10px 32px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Icon ring */
        .ob-icon-ring {
            position: relative;
            width: 200px;
            height: 200px;
            display: grid;
            place-items: center;
            margin-bottom: 32px;
            flex-shrink: 0;
        }

        .ob-icon-inner {
            width: 110px;
            height: 110px;
            border-radius: 34px;
            display: grid;
            place-items: center;
            font-size: 52px;
            color: #fff;
            position: relative;
            z-index: 2;
            box-shadow: 0 0 60px rgba(255, 255, 255, .15);
            animation: obPulse 3s ease-in-out infinite;
        }

        @keyframes obPulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 0 40px rgba(255, 255, 255, .12)
            }

            50% {
                transform: scale(1.06);
                box-shadow: 0 0 70px rgba(255, 255, 255, .28)
            }
        }

        .s1 .ob-icon-inner {
            background: linear-gradient(135deg, #6C3FF5, #8B63FF)
        }

        .s2 .ob-icon-inner {
            background: linear-gradient(135deg, #06D6A0, #0099CC)
        }

        .s3 .ob-icon-inner {
            background: linear-gradient(135deg, #FF4D9E, #8B0057)
        }

        .ob-ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, .12);
            animation: obRingPulse 3s ease-in-out infinite;
        }

        .r1 {
            width: 140px;
            height: 140px;
            animation-delay: 0s
        }

        .r2 {
            width: 175px;
            height: 175px;
            animation-delay: .4s
        }

        .r3 {
            width: 200px;
            height: 200px;
            animation-delay: .8s;
            border-color: rgba(255, 255, 255, .06)
        }

        @keyframes obRingPulse {

            0%,
            100% {
                opacity: .6;
                transform: scale(1)
            }

            50% {
                opacity: 1;
                transform: scale(1.03)
            }
        }

        .ob-brand {
            font-size: 13px;
            font-weight: 700;
            color: rgba(255, 255, 255, .5);
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 12px;
        }

        .ob-title {
            font-size: clamp(28px, 6vw, 42px);
            font-weight: 900;
            line-height: 1.15;
            color: #fff;
            letter-spacing: -1px;
            margin-bottom: 14px;
        }

        .ob-title span {
            background: linear-gradient(135deg, #FFD166, #F5A623);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .ob-desc {
            font-size: 15px;
            color: rgba(255, 255, 255, .7);
            line-height: 1.75;
            max-width: 340px;
            margin: 0 auto;
        }

        .ob-content {
            display: flex;
            flex-direction: column;
            align-items: center
        }

        .ob-cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: 28px;
            padding: 16px 40px;
            background: linear-gradient(135deg, #F5A623, #FFD166);
            border: none;
            border-radius: 50px;
            color: #1A0A30;
            font-size: 16px;
            font-weight: 800;
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
            box-shadow: 0 8px 32px rgba(245, 166, 35, .5);
            transition: .3s;
            animation: ctaPulse 2s ease-in-out infinite;
        }

        @keyframes ctaPulse {

            0%,
            100% {
                box-shadow: 0 8px 32px rgba(245, 166, 35, .5)
            }

            50% {
                box-shadow: 0 12px 48px rgba(245, 166, 35, .85);
                transform: translateY(-2px)
            }
        }

        .ob-cta-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 50px rgba(245, 166, 35, .8)
        }

        /* Dots */
        .ob-dots {
            display: flex;
            gap: 10px;
            padding: 20px 0 16px;
            justify-content: center;
            align-items: center;
        }

        .ob-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .3);
            border: none;
            cursor: pointer;
            transition: all .35s ease;
            padding: 0;
        }

        .ob-dot.active {
            width: 30px;
            border-radius: 5px;
            background: #fff;
        }

        /* Arrows */
        .ob-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .1);
            border: 1px solid rgba(255, 255, 255, .2);
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            display: grid;
            place-items: center;
            transition: .3s;
            backdrop-filter: blur(10px);
        }

        .ob-arrow:hover {
            background: rgba(255, 255, 255, .22)
        }

        .ob-prev {
            left: 16px;
            display: none
        }

        .ob-next {
            right: 16px;
            display: none
        }

        @media(min-width:600px) {

            .ob-prev,
            .ob-next {
                display: grid
            }
        }

        @media(max-width:480px) {
            .ob-slide {
                padding: 10px 24px
            }

            .ob-icon-ring {
                width: 150px;
                height: 150px;
                margin-bottom: 28px
            }

            .ob-icon-inner {
                width: 86px;
                height: 86px;
                font-size: 40px;
                border-radius: 28px
            }

            .r1 {
                width: 110px;
                height: 110px
            }

            .r2 {
                width: 130px;
                height: 130px
            }

            .r3 {
                width: 150px;
                height: 150px
            }

            .ob-brand {
                font-size: 11px;
                letter-spacing: 2px;
                margin-bottom: 8px
            }

            .ob-title {
                font-size: 32px;
                margin-bottom: 12px
            }

            .ob-desc {
                font-size: 14px;
                line-height: 1.6
            }

            .ob-cta-btn {
                padding: 12px 30px;
                font-size: 14px;
                margin-top: 22px
            }

            .ob-skip {
                top: 16px;
                right: 16px;
                padding: 6px 14px;
                font-size: 12px
            }

            .ob-dots {
                padding-bottom: 12px
            }
        }

        @media(max-height:660px) {
            .ob-icon-ring {
                width: 130px;
                height: 130px;
                margin-bottom: 18px
            }

            .ob-icon-inner {
                width: 76px;
                height: 76px;
                font-size: 34px
            }

            .r1,
            .r2,
            .r3 {
                display: none
            }

            .ob-title {
                font-size: 26px
            }

            .ob-desc {
                font-size: 13px;
                line-height: 1.5
            }

            .ob-cta-btn {
                padding: 10px 24px;
                font-size: 13px;
                margin-top: 16px
            }
        }

        /* BACK TO TOP */
        #btt {
            position: fixed;
            bottom: 26px;
            right: 26px;
            z-index: 999;
            width: 44px;
            height: 44px;
            border-radius: 11px;
            background: var(--gb);
            border: none;
            cursor: pointer;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 16px;
            box-shadow: 0 8px 26px rgba(108, 63, 245, .46);
            opacity: 0;
            pointer-events: none;
            transform: translateY(16px);
            transition: .3s
        }

        #btt.show {
            opacity: 1;
            pointer-events: all;
            transform: translateY(0)
        }

        #btt:hover {
            transform: translateY(-3px)
        }

        /* ===== RESPONSIVE ===== */
        @media(max-width:1024px) {
            .ag {
                grid-template-columns: 1fr;
                gap: 40px
            }

            .at {
                order: -1
            }

            .fg {
                grid-template-columns: repeat(2, 1fr)
            }

            .gg {
                grid-template-columns: repeat(2, 1fr)
            }

            .gc2.tall {
                min-height: 200px
            }

            .gc2.wide {
                grid-column: span 1
            }

            .tg {
                grid-template-columns: repeat(2, 1fr)
            }

            .fg2 {
                grid-template-columns: 1fr 1fr;
                gap: 34px
            }

            .sw {
                grid-template-columns: repeat(2, 1fr)
            }

            .sl2 {
                display: none
            }
        }

        @media(max-width:768px) {

            .nlinks,
            .ncta {
                display: none
            }

            .hbg {
                display: flex
            }

            .sdv {
                display: none
            }

            .hstats {
                gap: 20px
            }

            .hvis {
                margin-top: 44px
            }

            .fb {
                display: none
            }

            .about-s,
            .feat-s,
            .how-s,
            .gal-s,
            .testi-s,
            .cta-s {
                padding: 76px 0
            }

            .fg {
                grid-template-columns: 1fr
            }

            .gg {
                grid-template-columns: 1fr
            }

            .gc2.wide,
            .gc2.tall {
                grid-column: span 1;
                min-height: 170px
            }

            .tg {
                grid-template-columns: 1fr
            }

            .sw {
                grid-template-columns: 1fr 1fr;
                gap: 22px
            }

            .cbox {
                padding: 44px 22px
            }

            .fg2 {
                grid-template-columns: 1fr;
                gap: 28px
            }

            .fbot {
                flex-direction: column;
                text-align: center
            }
        }

        @media(max-width:480px) {
            .htitle {
                font-size: clamp(32px, 9.5vw, 46px);
                letter-spacing: -.5px
            }

            .bgrp {
                flex-direction: column;
                align-items: stretch
            }

            .btn-pr,
            .btn-sk,
            .btn-wa {
                justify-content: center
            }

            .sw {
                grid-template-columns: 1fr
            }

            .tbar-in {
                gap: 18px
            }

            .ti {
                font-size: 13px
            }

            .cbtns {
                flex-direction: column;
                align-items: stretch
            }

            .cbtns .btn-pr {
                justify-content: center
            }
        }
    </style>
</head>

<body>

    <!-- Particles -->
    <div id="ptcl" aria-hidden="true"></div>

    <!-- Overlay -->
    <div class="moverlay" id="movl" onclick="closeD()"></div>

    <!-- Mobile Drawer -->
    <div class="mdrawer" id="mdrawer" role="dialog" aria-label="Mobile navigation">
        <a href="#home" onclick="closeD()"><i class="fa-solid fa-house"></i>Home</a>
        <a href="#about" onclick="closeD()"><i class="fa-solid fa-circle-info"></i>About</a>
        <a href="#features" onclick="closeD()"><i class="fa-solid fa-layer-group"></i>Features</a>
        <a href="#how" onclick="closeD()"><i class="fa-solid fa-list-ol"></i>How It Works</a>
        <a href="#gallery" onclick="closeD()"><i class="fa-solid fa-grip"></i>Gallery</a>
        <a href="#contact" onclick="closeD()"><i class="fa-solid fa-envelope"></i>Contact</a>
        <div class="mbtns">
            <a href="/login" class="btn-ol" style="display:flex;align-items:center;justify-content:center;">Login</a>
            <a href="#" class="btn-pr open-onboard" onclick="closeD()"><i class="fa-solid fa-rocket"></i>Get Started</a>
        </div>
    </div>

    <!-- Navbar -->
    <nav id="nav" aria-label="Main navigation">
        <a href="#home" class="nl">
            <div class="ni"><i class="fa-solid fa-wallet"></i></div>
            <span class="nt">WPCS Wallet</span>
        </a>
        <ul class="nlinks">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#how">How It Works</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="ncta">
            <a href="/login" class="btn-ol">Login</a>
            <a href="#" class="btn-fl open-onboard">Get Started</a>
        </div>
        <button class="hbg" id="hbg" onclick="toggleD()" aria-label="Open menu">
            <span></span><span></span><span></span>
        </button>
    </nav>

    <!-- ==================== HERO ==================== -->
    <section class="hero" id="home">
        <div class="orb o1" aria-hidden="true"></div>
        <div class="orb o2" aria-hidden="true"></div>
        <div class="orb o3" aria-hidden="true"></div>
        <div class="hi">
            <div class="hbadge" data-aos="fade-down">
                <span class="ldot"></span>
                Now Live — WPCS Wallet v2.0
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
            </div>
            <h1 class="htitle">
                <span class="t1" data-aos="fade-up" data-aos-delay="80">Your Money,</span>
                <span class="t2" data-aos="fade-up" data-aos-delay="160">Your Power.</span>
            </h1>
            <p class="hsub" data-aos="fade-up" data-aos-delay="240">
                WPCS Wallet delivers lightning-fast deposits, instant withdrawals, and bank-grade security — all in one
                beautifully simple platform.
            </p>
            <div class="bgrp" data-aos="fade-up" data-aos-delay="320">
                <a href="#" class="btn-pr open-onboard" id="hero-start"><i class="fa-solid fa-rocket"></i> Get Started
                    Free</a>
                <a href="https://wa.me/923047244398" class="btn-pr btn-wa" target="_blank" rel="noopener"><i
                        class="fa-brands fa-whatsapp"></i> WhatsApp Support</a>
                <a href="#features" class="btn-sk"><i class="fa-solid fa-circle-play"></i> See Features</a>
            </div>
            <div class="hstats" data-aos="fade-up" data-aos-delay="400">
                <div class="si"><span class="sn">50K+</span><span class="sl">Active Users</span></div>
                <div class="sdv"></div>
                <div class="si"><span class="sn">$2M+</span><span class="sl">Daily Transactions</span></div>
                <div class="sdv"></div>
                <div class="si"><span class="sn">99.9%</span><span class="sl">Uptime SLA</span></div>
                <div class="sdv"></div>
                <div class="si"><span class="sn">&lt;2s</span><span class="sl">Transfer Speed</span></div>
            </div>
            <!-- Wallet Card -->
            <div class="hvis" data-aos="zoom-in" data-aos-delay="280">
                <div class="wcard">
                    <div class="wct">
                        <div class="wchip"><i class="fa-solid fa-microchip"></i></div>
                        <span class="wnet">WPCS NETWORK</span>
                    </div>
                    <div class="wbl-lbl">Total Balance</div>
                    <div class="wbal"><sup>$</sup>24,850.00</div>
                    <div class="wft">
                        <div>
                            <div class="who">WPCS Member</div>
                            <div class="wno">•••• •••• •••• 4291</div>
                        </div>
                        <div>
                            <div class="wex-l">EXPIRES</div>
                            <div class="wex-v">12/28</div>
                        </div>
                    </div>
                    <div class="fb fb1" aria-hidden="true">
                        <div class="fbi fig"><i class="fa-solid fa-arrow-trend-up"></i></div>
                        <div><strong>+$1,240</strong><small>Deposit success</small></div>
                    </div>
                    <div class="fb fb2" aria-hidden="true">
                        <div class="fbi fip"><i class="fa-solid fa-shield-halved"></i></div>
                        <div><strong>Secured</strong><small>256-bit AES</small></div>
                    </div>
                    <div class="fb fb3" aria-hidden="true">
                        <div class="fbi fia"><i class="fa-solid fa-bolt"></i></div>
                        <div><strong>Instant</strong><small>Transfer done</small></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Bar -->
    <div class="tbar">
        <div class="tbar-in">
            <div class="ti" data-aos="fade-up"><i class="fa-solid fa-shield-halved"></i><span>Bank-Grade Security</span>
            </div>
            <div class="ti" data-aos="fade-up" data-aos-delay="60"><i class="fa-solid fa-bolt"></i><span>Instant
                    Transfers</span></div>
            <div class="ti" data-aos="fade-up" data-aos-delay="120"><i class="fa-solid fa-globe"></i><span>Worldwide
                    Access</span></div>
            <div class="ti" data-aos="fade-up" data-aos-delay="180"><i class="fa-solid fa-headset"></i><span>24/7
                    Support</span></div>
            <div class="ti" data-aos="fade-up" data-aos-delay="240"><i class="fa-solid fa-lock"></i><span>SSL
                    Encrypted</span></div>
        </div>
    </div>

    <!-- ==================== ABOUT ==================== -->
    <section class="about-s" id="about">
        <div class="con">
            <div class="ag">
                <div class="astack">
                    <div class="acard" data-aos="fade-right">
                        <div class="aci ic-p"><i class="fa-solid fa-earth-asia"></i></div>
                        <div>
                            <h3>Global Reach</h3>
                            <p>Serving users across Asia, Europe &amp; beyond with seamless cross-border transactions
                                and multi-currency support.</p>
                        </div>
                    </div>
                    <div class="acard" data-aos="fade-right" data-aos-delay="80">
                        <div class="aci ic-a"><i class="fa-solid fa-chart-line"></i></div>
                        <div>
                            <h3>Financial Intelligence</h3>
                            <p>Smart analytics and real-time reporting to track every transaction and grow your finances
                                confidently.</p>
                        </div>
                    </div>
                    <div class="acard" data-aos="fade-right" data-aos-delay="160">
                        <div class="aci ic-g"><i class="fa-solid fa-users-gear"></i></div>
                        <div>
                            <h3>Expert Team</h3>
                            <p>Built by world-class fintech engineers and security specialists dedicated to the best
                                experience.</p>
                        </div>
                    </div>
                    <div class="acard" data-aos="fade-right" data-aos-delay="240">
                        <div class="aci ic-pk"><i class="fa-solid fa-award"></i></div>
                        <div>
                            <h3>Award-Winning Platform</h3>
                            <p>Recognized globally for innovation in digital payments and outstanding UX design.</p>
                        </div>
                    </div>
                </div>
                <div class="at" data-aos="fade-left">
                    <div class="stag">About Us</div>
                    <h2>Your Trusted <span
                            style="background:linear-gradient(135deg,var(--pri-l),var(--acc));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Digital
                            Wallet</span> Partner</h2>
                    <p>WPCS Wallet is your <span class="hlt">all-in-one financial gateway</span> — designed to make
                        sending, receiving, and managing money as effortless as possible.</p>
                    <p>We combine cutting-edge security with an intuitive experience, giving you the power of a full
                        banking suite in your pocket. Present in <span class="hlt">50+ countries</span>.</p>
                    <div class="anums">
                        <div class="anc" data-aos="zoom-in" data-aos-delay="200"><span class="n">50+</span><span
                                class="l">Countries</span></div>
                        <div class="anc" data-aos="zoom-in" data-aos-delay="280"><span class="n">2M+</span><span
                                class="l">Transactions/Month</span></div>
                        <div class="anc" data-aos="zoom-in" data-aos-delay="360"><span class="n">50K+</span><span
                                class="l">Happy Users</span></div>
                        <div class="anc" data-aos="zoom-in" data-aos-delay="440"><span class="n">4.9<i
                                    class="fa-solid fa-star"
                                    style="font-size:16px;color:var(--acc);-webkit-text-fill-color:var(--acc);"></i></span><span
                                class="l">User Rating</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FEATURES ==================== -->
    <section class="feat-s" id="features">
        <div class="con">
            <div class="sh">
                <div class="stag" data-aos="fade-up">Why Choose Us</div>
                <h2 class="stitle" data-aos="fade-up" data-aos-delay="80">Everything You Need in <span class="hl">One
                        Wallet</span></h2>
                <p class="sdesc" data-aos="fade-up" data-aos-delay="160">Powerful features wrapped in a beautifully
                    simple interface.</p>
            </div>
            <div class="fg">
                <div class="fc" data-aos="fade-up">
                    <div class="fci ic-p"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Military-Grade Security</h3>
                    <p>256-bit AES encryption, 2FA, and real-time fraud detection keep your funds 100% safe at all
                        times.</p>
                    <div class="ftag"><i class="fa-solid fa-lock"></i> Bank-level protection</div>
                </div>
                <div class="fc" data-aos="fade-up" data-aos-delay="80">
                    <div class="fci ic-a"><i class="fa-solid fa-bolt"></i></div>
                    <h3>Instant Deposits</h3>
                    <p>Fund your wallet in under 2 seconds. No delays, no waiting — your money is ready the moment you
                        need it.</p>
                    <div class="ftag"><i class="fa-solid fa-gauge-high"></i> Lightning fast</div>
                </div>
                <div class="fc" data-aos="fade-up" data-aos-delay="160">
                    <div class="fci ic-g"><i class="fa-solid fa-money-bill-transfer"></i></div>
                    <h3>Seamless Withdrawals</h3>
                    <p>Withdraw to any bank account or payment method worldwide with zero hidden fees.</p>
                    <div class="ftag"><i class="fa-solid fa-circle-check"></i> Zero hidden fees</div>
                </div>
                <div class="fc" data-aos="fade-up">
                    <div class="fci ic-pk"><i class="fa-solid fa-chart-pie"></i></div>
                    <h3>Smart Analytics</h3>
                    <p>Beautiful charts, detailed reports, and intelligent budget alerts for better money management.
                    </p>
                    <div class="ftag"><i class="fa-solid fa-chart-bar"></i> Smart insights</div>
                </div>
                <div class="fc" data-aos="fade-up" data-aos-delay="80">
                    <div class="fci ic-b"><i class="fa-solid fa-globe"></i></div>
                    <h3>Multi-Currency Support</h3>
                    <p>Transact in 100+ currencies with live exchange rates — perfect for global users and businesses.
                    </p>
                    <div class="ftag"><i class="fa-solid fa-earth-americas"></i> 100+ currencies</div>
                </div>
                <div class="fc" data-aos="fade-up" data-aos-delay="160">
                    <div class="fci ic-o"><i class="fa-solid fa-headset"></i></div>
                    <h3>24/7 Live Support</h3>
                    <p>Expert support via chat, WhatsApp and email — around the clock, resolving issues in minutes.</p>
                    <div class="ftag"><i class="fa-solid fa-clock"></i> Always available</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== HOW IT WORKS ==================== -->
    <section class="how-s" id="how">
        <div class="con">
            <div class="sh">
                <div class="stag" data-aos="fade-up">Simple Process</div>
                <h2 class="stitle" data-aos="fade-up" data-aos-delay="80">Up &amp; Running in <span class="hl">4 Easy
                        Steps</span></h2>
                <p class="sdesc" data-aos="fade-up" data-aos-delay="160">Getting started with WPCS Wallet is incredibly
                    simple.</p>
            </div>
            <div class="sw" data-aos="fade-up" data-aos-delay="240">
                <div class="sl2" aria-hidden="true"></div>
                <div class="step">
                    <div class="snum"><i class="fa-solid fa-user-plus"></i></div>
                    <h3>Create Account</h3>
                    <p>Sign up in 60 seconds with email &amp; phone. No paperwork required.</p>
                </div>
                <div class="step">
                    <div class="snum"><i class="fa-solid fa-id-card"></i></div>
                    <h3>Verify Identity</h3>
                    <p>Quick KYC keeps your account safe and unlocks all premium features.</p>
                </div>
                <div class="step">
                    <div class="snum"><i class="fa-solid fa-piggy-bank"></i></div>
                    <h3>Fund Wallet</h3>
                    <p>Add money via bank, card or any payment method — arrives in seconds.</p>
                </div>
                <div class="step">
                    <div class="snum"><i class="fa-solid fa-paper-plane"></i></div>
                    <h3>Transact Freely</h3>
                    <p>Send, receive and manage money globally with zero friction.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== GALLERY ==================== -->
    <section class="gal-s" id="gallery">
        <div class="con">
            <div class="sh">
                <div class="stag" data-aos="fade-up">Platform Showcase</div>
                <h2 class="stitle" data-aos="fade-up" data-aos-delay="80">Explore the <span class="hl">WPCS
                        Experience</span></h2>
                <p class="sdesc" data-aos="fade-up" data-aos-delay="160">Discover the power and elegance of our
                    platform.</p>
            </div>
            <div class="gg" data-aos="fade-up" data-aos-delay="240">
                <div class="gc2 tall">
                    <div class="gir ic-p"><i class="fa-solid fa-table-columns"></i></div>
                    <h4>Smart Dashboard</h4>
                    <span>Full balance &amp; analytics overview</span>
                </div>
                <div class="gc2">
                    <div class="gir ic-a"><i class="fa-solid fa-bolt"></i></div>
                    <h4>Instant Transfers</h4>
                    <span>Send money in seconds</span>
                </div>
                <div class="gc2">
                    <div class="gir ic-g"><i class="fa-solid fa-fingerprint"></i></div>
                    <h4>Advanced Security</h4>
                    <span>Multi-layer protection</span>
                </div>
                <div class="gc2 wide">
                    <div class="gir ic-pk"><i class="fa-solid fa-chart-column"></i></div>
                    <h4>Transaction History &amp; Analytics</h4>
                    <span>Detailed charts and spending reports</span>
                </div>
                <div class="gc2">
                    <div class="gir ic-b"><i class="fa-solid fa-coins"></i></div>
                    <h4>Multi-Currency</h4>
                    <span>100+ global currencies</span>
                </div>
                <div class="gc2">
                    <div class="gir ic-o"><i class="fa-solid fa-mobile-screen"></i></div>
                    <h4>Mobile Ready</h4>
                    <span>Perfect on any device</span>
                </div>
                <div class="gc2">
                    <div class="gir ic-p"><i class="fa-solid fa-headset"></i></div>
                    <h4>24/7 Support</h4>
                    <span>Always here for you</span>
                </div>
                <div class="gc2">
                    <div class="gir ic-a"><i class="fa-solid fa-gift"></i></div>
                    <h4>Rewards Program</h4>
                    <span>Earn on every transaction</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== TESTIMONIALS ==================== -->
    <section class="testi-s" id="testimonials">
        <div class="con">
            <div class="sh">
                <div class="stag" data-aos="fade-up">What People Say</div>
                <h2 class="stitle" data-aos="fade-up" data-aos-delay="80">Loved by <span class="hl">50,000+ Users</span>
                </h2>
                <p class="sdesc" data-aos="fade-up" data-aos-delay="160">Real stories from real people who trust WPCS
                    Wallet every day.</p>
            </div>
            <div class="tg">
                <div class="tc" data-aos="fade-up">
                    <div class="tstars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i></div>
                    <div class="tq">"</div>
                    <p class="tt">WPCS Wallet changed the game for me. Deposits are instant, withdrawals are seamless,
                        and I feel completely safe. Best wallet I've ever used!</p>
                    <div class="tau">
                        <div class="tav" style="background:linear-gradient(135deg,#6C3FF5,#8B63FF);">A</div>
                        <div>
                            <div class="tan">Ahmed K.</div>
                            <div class="tar">Business Owner, Dubai</div>
                        </div>
                    </div>
                </div>
                <div class="tc" data-aos="fade-up" data-aos-delay="100">
                    <div class="tstars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i></div>
                    <div class="tq">"</div>
                    <p class="tt">I've tried many wallets, but WPCS is on a completely different level. Beautiful
                        interface, lightning fast, and incredible support team!</p>
                    <div class="tau">
                        <div class="tav" style="background:linear-gradient(135deg,#F5A623,#FFD166);">S</div>
                        <div>
                            <div class="tan">Sara M.</div>
                            <div class="tar">Freelancer, Pakistan</div>
                        </div>
                    </div>
                </div>
                <div class="tc" data-aos="fade-up" data-aos-delay="200">
                    <div class="tstars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i></div>
                    <div class="tq">"</div>
                    <p class="tt">Managing multiple currencies was a nightmare before. WPCS Wallet makes it effortless —
                        live rates, no hidden fees, instant transfers. Love it!</p>
                    <div class="tau">
                        <div class="tav" style="background:linear-gradient(135deg,#06D6A0,#00B4D8);">R</div>
                        <div>
                            <div class="tan">Raza T.</div>
                            <div class="tar">Digital Marketer, UK</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== CTA ==================== -->
    <section class="cta-s" id="contact">
        <div class="con">
            <div class="cbox" data-aos="zoom-in">
                <h2>Ready to Take Control of<br><span
                        style="background:linear-gradient(135deg,#6C3FF5,#F5A623);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Your
                        Finances?</span></h2>
                <p>Join 50,000+ users who trust WPCS Wallet for secure, instant, and seamless money management every
                    day.</p>
                <div class="cbtns">
                    <a href="#" class="btn-pr open-onboard"><i class="fa-solid fa-rocket"></i> Create Free Account</a>
                    <a href="https://wa.me/923047244398" class="btn-pr btn-wa" target="_blank" rel="noopener"><i
                            class="fa-brands fa-whatsapp"></i> Chat on WhatsApp</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer>
        <div class="fg2">
            <div>
                <div class="fbl"><i class="fa-solid fa-wallet"></i> WPCS Wallet</div>
                <p class="fbd">Your ultimate digital wallet for secure, instant, and seamless financial transactions
                    worldwide. Built for the modern era.</p>
                <div class="socs">
                    <a href="#" class="sl3" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="sl3" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#" class="sl3" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="sl3" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#" class="sl3" aria-label="Telegram"><i class="fa-brands fa-telegram"></i></a>
                </div>
            </div>
            <div class="fcol">
                <h4>Product</h4>
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Deposits</a></li>
                    <li><a href="#">Withdrawals</a></li>
                    <li><a href="#">Transaction History</a></li>
                    <li><a href="#">Analytics</a></li>
                </ul>
            </div>
            <div class="fcol">
                <h4>Company</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Partners</a></li>
                </ul>
            </div>
            <div class="fcol">
                <h4>Support</h4>
                <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Security</a></li>
                </ul>
            </div>
        </div>
        <div class="fbot">
            <p>&copy; 2025 WPCS Wallet. All rights reserved. Built with <i class="fa-solid fa-heart"
                    style="color:var(--pnk);font-size:11px;"></i> for secure finance.</p>
            <p><a href="#">Privacy</a> &middot; <a href="#">Terms</a> &middot; <a href="#">Security</a></p>
        </div>
    </footer>

    <button id="btt" aria-label="Back to top"><i class="fa-solid fa-chevron-up"></i></button>

    <!-- Onboarding Modal HTML directly in body before script -->
    <div id="onboard" class="onboard" role="dialog" aria-modal="true" aria-label="Welcome onboarding">
        <button class="ob-skip" onclick="obClose()">Skip <i class="fa-solid fa-forward"></i></button>
        <div class="ob-track-wrap">
            <div class="ob-track" id="ob-track" style="cursor: grab;">
                <div class="ob-slide" data-bg="linear-gradient(160deg,#1A0050 0%,#3B0D8C 50%,#6C3FF5 100%)">
                    <div class="ob-icon-ring s1">
                        <div class="ob-icon-inner"><i class="fa-solid fa-wallet"></i></div>
                        <div class="ob-ring r1"></div>
                        <div class="ob-ring r2"></div>
                        <div class="ob-ring r3"></div>
                    </div>
                    <div class="ob-content">
                        <div class="ob-brand">WPCS Wallet</div>
                        <h2 class="ob-title">Welcome to<br><span>WPCS Wallet</span></h2>
                        <p class="ob-desc">Your all-in-one secure digital wallet. Send, receive and manage money
                            instantly — anywhere in the world.</p>
                    </div>
                </div>
                <div class="ob-slide" data-bg="linear-gradient(160deg,#0A1A40 0%,#0D3070 50%,#0A6E5E 100%)">
                    <div class="ob-icon-ring s2">
                        <div class="ob-icon-inner"><i class="fa-solid fa-bolt"></i></div>
                        <div class="ob-ring r1"></div>
                        <div class="ob-ring r2"></div>
                        <div class="ob-ring r3"></div>
                    </div>
                    <div class="ob-content">
                        <div class="ob-brand">WPCS Wallet</div>
                        <h2 class="ob-title">Lightning Fast<br><span>Transfers</span></h2>
                        <p class="ob-desc">Deposit or withdraw funds in under 2 seconds. Real-time transaction tracking
                            with zero delays.</p>
                    </div>
                </div>
                <div class="ob-slide" data-bg="linear-gradient(160deg,#1A0A30 0%,#2A1060 50%,#8B0057 100%)">
                    <div class="ob-icon-ring s3">
                        <div class="ob-icon-inner"><i class="fa-solid fa-shield-halved"></i></div>
                        <div class="ob-ring r1"></div>
                        <div class="ob-ring r2"></div>
                        <div class="ob-ring r3"></div>
                    </div>
                    <div class="ob-content">
                        <div class="ob-brand">WPCS Wallet</div>
                        <h2 class="ob-title">Bank-Grade<br><span>Security</span></h2>
                        <p class="ob-desc">256-bit AES encryption and two-factor authentication. Your money is always
                            safe with us.</p>
                        <a href="/register" class="ob-cta-btn"><i class="fa-solid fa-rocket"></i> Create Free
                            Account</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ob-dots">
            <button class="ob-dot active" onclick="obGoTo(0)"></button>
            <button class="ob-dot" onclick="obGoTo(1)"></button>
            <button class="ob-dot" onclick="obGoTo(2)"></button>
        </div>
        <button class="ob-arrow ob-prev" onclick="obPrev()"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="ob-arrow ob-next" onclick="obNext()" id="ob-next-btn"><i
                class="fa-solid fa-chevron-right"></i></button>
    </div>

    <!-- AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({ duration: 660, once: true, easing: 'ease-out-cubic', offset: 55 });

        /* Particles */
        (function () {
            const c = document.getElementById('ptcl');
            if (!c) return;
            const cols = ['#6C3FF5', '#8B63FF', '#F5A623', '#FFD166', '#FF4D9E', '#06D6A0'];
            for (let i = 0; i < 22; i++) {
                const p = document.createElement('div');
                p.className = 'pt';
                const s = Math.random() * 5 + 2;
                p.style.cssText = `width:${s}px;height:${s}px;left:${Math.random() * 100}%;background:${cols[Math.floor(Math.random() * cols.length)]};animation-duration:${Math.random() * 13 + 8}s;animation-delay:${Math.random() * -18}s;`;
                c.appendChild(p);
            }
        })();

        /* Navbar scroll */
        const nav = document.getElementById('nav');
        const btt = document.getElementById('btt');
        window.addEventListener('scroll', () => {
            if (nav) nav.classList.toggle('sc', window.scrollY > 50);
            if (btt) btt.classList.toggle('show', window.scrollY > 360);
        }, { passive: true });

        /* Smooth scroll */
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', e => {
                const t = document.querySelector(a.getAttribute('href'));
                if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
            });
        });

        if (btt) btt.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        /* Mobile Drawer */
        const md = document.getElementById('mdrawer');
        const mo = document.getElementById('movl');
        const hb = document.getElementById('hbg');

        window.toggleD = function () {
            md.classList.toggle('open');
            mo.classList.toggle('open');
            hb.classList.toggle('x');
            document.body.style.overflow = md.classList.contains('open') ? 'hidden' : '';
        }
        window.closeD = function () {
            md.classList.remove('open');
            mo.classList.remove('open');
            hb.classList.remove('x');
            document.body.style.overflow = '';
        }

        /* Gallery glow */
        document.querySelectorAll('.gc2').forEach(c => {
            c.addEventListener('mousemove', e => {
                const r = c.getBoundingClientRect();
                c.style.background = `radial-gradient(circle at ${e.clientX - r.left}px ${e.clientY - r.top}px,rgba(108,63,245,.15),#10102A 70%)`;
            });
            c.addEventListener('mouseleave', () => c.style.background = '');
        });

        /* ===== ONBOARDING SLIDER ===== */
        document.addEventListener('DOMContentLoaded', () => {
            const ob = document.getElementById('onboard');
            const obSlides = document.querySelectorAll('.ob-slide');
            const obDots = document.querySelectorAll('.ob-dot');
            const obTrack = document.getElementById('ob-track');

            if (!ob || !obTrack) return;

            let obCur = 0, obTotal = obSlides.length;
            let obDragStart = 0, obDragDelta = 0, obDragging = false;

            window.obOpen = function () {
                ob.classList.add('show');
                document.body.style.overflow = 'hidden';
                obGoTo(0);
            }
            window.obClose = function () {
                ob.classList.remove('show');
                document.body.style.overflow = '';
                obGoTo(0);
            }
            window.obGoTo = function (idx) {
                obCur = Math.max(0, Math.min(idx, obTotal - 1));
                obTrack.style.transition = 'transform .45s cubic-bezier(.4,0,.2,1)';
                obTrack.style.transform = `translateX(-${obCur * 100}%)`;
                obDots.forEach((d, i) => d.classList.toggle('active', i === obCur));
                // update bg
                ob.style.background = obSlides[obCur].dataset.bg;
            }
            window.obNext = function () { if (obCur < obTotal - 1) obGoTo(obCur + 1); }
            window.obPrev = function () { if (obCur > 0) obGoTo(obCur - 1); }

            // Touch
            obTrack.addEventListener('touchstart', e => {
                obDragStart = e.touches[0].clientX; obDragging = true;
                obTrack.style.transition = 'none';
            }, { passive: true });
            obTrack.addEventListener('touchmove', e => {
                if (!obDragging) return;
                obDragDelta = e.touches[0].clientX - obDragStart;
                obTrack.style.transform = `translateX(calc(-${obCur * 100}% + ${obDragDelta}px))`;
            }, { passive: true });
            obTrack.addEventListener('touchend', () => {
                obDragging = false;
                if (obDragDelta < -50) obNext();
                else if (obDragDelta > 50) obPrev();
                else obGoTo(obCur);
                obDragDelta = 0;
            });

            // Mouse Drag
            obTrack.addEventListener('mousedown', e => {
                obDragStart = e.clientX; obDragging = true;
                obTrack.style.transition = 'none';
                obTrack.style.cursor = 'grabbing';
            });
            window.addEventListener('mousemove', e => {
                if (!obDragging) return;
                obDragDelta = e.clientX - obDragStart;
                obTrack.style.transform = `translateX(calc(-${obCur * 100}% + ${obDragDelta}px))`;
            });
            window.addEventListener('mouseup', () => {
                if (!obDragging) return;
                obDragging = false;
                obTrack.style.cursor = 'grab';
                if (obDragDelta < -50) obNext();
                else if (obDragDelta > 50) obPrev();
                else obGoTo(obCur);
                obDragDelta = 0;
            });

            // Wire Get Started buttons
            document.querySelectorAll('.open-onboard').forEach(btn => {
                btn.addEventListener('click', e => { e.preventDefault(); obOpen(); });
            });
        });
    </script>
</body>

</html>