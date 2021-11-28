import React from 'react';

export default function CardDownload({document})
{
    return(
        <>
            <div className="dropdown-file">
                <a href="" className="dropdown-link" data-toggle="dropdown">
                    <i className="fa fa-ellipsis-v"/>
                </a>
                <div className="dropdown-menu dropdown-menu-right">
                    <a href={'/documents/'+ document.docName} download
                       className="dropdown-item">Télécharger</a>
                </div>
            </div>
        </>
    )
}