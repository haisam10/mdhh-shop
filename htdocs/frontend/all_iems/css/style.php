<style>
    :root{
    --main-color: #0F0F0F!important;
    --second-color: #1c64f2!important;
    --font-color: #D9D9D9!important;
    --fourth-color: #26262c!important;
    --fifth-color: #1d1d1d!important;
}
/* Dispalay */
.d-flex{    display: flex!important;          }  
.d-block{   display: block!important;         }
.d-inline{  display: inline!important;        }
.fx-d-col{  flex-direction: column!important;   }
.fx-d-row{  flex-direction: row!important;      }   

/* Justify Content */
.j-cn-cn{   justify-content: center!important;          }
.j-cn-sb{   justify-content: space-between!important;   }
.j-cn-ar{   justify-content: space-around!important;    }
.j-cn-ev{   justify-content: space-evenly!important;    }

/* Justify Item */
.j-i-cn{    justify-items: center!important;            }
.j-i-sb{    justify-items: space-between!important;     }
.j-i-sl{    justify-items: space-around!important;      }

/* Align Item */
.a-i-cn{    align-items: center!important;              }
.a-i-sb{    align-items: space-between!important;       }
.a-i-sl{    align-items: space-around!important;        }
/* Align Content */

/* Text Align */
.txt-cn{    text-align: center!important;               }     
.txt-lf{    text-align: left!important;                 }
.txt-rt{    text-align: right!important;                }

/* Text Decoration */
.txt-underline{ text-decoration: underline!important;   }
.txt-nome{      text-decoration: none!important;        }         

/* Text Transform */
.txt-uppercase{ text-transform: uppercase!important;    }
.txt-lowercase{ text-transform: lowercase!important;    }
.txt-capitalize{text-transform: capitalize!important;  }

html{
    scroll-behavior: smooth;
}
body{
    margin:0!important;
    padding:0!important;
    font-family:Arial, Helvetica, sans-serif;
    background-color: var(--main-color);
    color: var(--font-color);
    /* overflow-x: hidden; */
}
.mini-header{
    background-color: var(--second-color);
    color: var(--font-color);
    padding: 5px;
    margin: 0;
}
.header{
    margin: 1% 0% auto;
    width: 93%;

    ul{
        background-color: var(--fifth-color);
        color: var(--font-color);
        padding: 5px 30px;
        border-radius: 25px;
        transition: 1s all;
        box-shadow: 0px 0px 10px var(--second-color);
        &:hover{
            background-color: var(--fourth-color);
            transition: 1s all;
            box-shadow: 0px 0px 25px var(--font-color);
        }
            a{
                color: var(--font-color);
                text-decoration: none;
                transition: 1s all;
                    &:hover{
                        transition: 1s all;
                        text-decoration: underline;
                    }
                        li{
                            list-style: none;
                            padding: 7px 20px;
                            transition: 1s all;
                                &:hover{
                                    transition: 1s all;
                                    text-decoration: underline;
                                }
                        }
            }
    }
}
.hero-area{
        @media (max-width: 768px) {
            flex-direction: column;
            width: 100%;
            height: auto;
        }
}
.hero-area-img-hero{
    border: 1px solid var(--fourth-color);
    border-radius: 9px;
    transition: 0.5s all;
    background-color: #000;
    &:hover{
        transition: 1s all;
        box-shadow: 0px 0px 10px var(--second-color);
    }
    img{
        width: 40.7vw;
        height: auto;
        transition: 0.5s all;
        &:hover{
            transform: scale(1.1);
            transition: 0.5s all;
        }
    }
}
.hero-area-img-side{
    margin: 0.5rem;
    img{
        width: 16.7vw;;
        height: auto;
            &:hover{
                transform: scale(1.1);
                transition: 0.5s all;
            }
    }
    div{
        background-color: #000;
        border-radius: 9px;
        margin: 0.5rem;
        transition: 0.5s all;
        border: 1px solid var(--fourth-color);
            &:hover{
                transition: 1s all;
                box-shadow: 0px 0px 10px var(--second-color);
            }
        }
}
.hero-area-image-tag{
    position: absolute;
    border: 1.5px solid var(--fourth-color);
    align-items: center;
    background-color: transparent;
    top: 30vw;
    z-index: 1;
    color: var(--font-color);
    padding: 0.5vw;
    margin-left: 3vw;
    font-size: 1vw;
    border-radius: 25vw;
        button{
            margin-left: 1vw;
            padding: 0.1vw 1vw;
            background-color: var(--second-color);
            border-radius: 25vw;
            border: none;
            color: var(--font-color);
            cursor: pointer;
            font-size: 1vw;
        }
}
#hero-area-image-side-tag{
    border: 1.5px solid var(--fourth-color);
    align-items: center;
    background-color: transparent;
    color: var(--font-color);
    padding: 0.5rem;
    margin: 0.5vw;
    font-size: 0.8rem;
    border-radius: 25px;
        button{
            margin-left: 1vw;
            padding: 0.3vw 0.5vw;
            background-color: var(--second-color);
            border-radius: 25vw;
            border: none;
            color: var(--font-color);
            cursor: pointer;
        }
}
#carousel-images{
    padding: 50px 0;
    div {
        margin: 4px 21px;
        padding: 4px 24px;
        border: 1px solid var(--fourth-color);
        border-radius: 8px;
        background: black;
        transition: 0.5s all;
        &:hover{
            transition: 1s all;
            box-shadow: 0px 0px 10px var(--second-color);
        }
    }
}
.footer-content{
    .footer-logo{
        margin-left: 15px;
        width: 10%;
        padding: 20px 10vw;
        img{
            margin: 10px;
        }
    }
    padding: 20px;
    .footer-links{
        padding: 20px  50px;
        a{
            color: var(--font-color);
            text-decoration: none;
            padding: 5px;
            transition: 1s all;
                &:hover{
                    transition: 1s all;
                    text-decoration: underline;
                }
        }
    }
}
.footer-bottom{
    text-align: center;
    padding: 1px;
    color: var(--font-color);
    background-color: var(--second-color);
    a{
        color: var(--font-color);
        text-decoration: none;
        transition: 1s all;
            &:hover{
                transition: 1s all;
                text-decoration: underline;
            }
    }
}
.footer-container{
    margin-top: 50px;
    background-color: var(--fifth-color);
    color: var(--font-color);
    border-top: 1px solid var(--fourth-color);
}
</style>