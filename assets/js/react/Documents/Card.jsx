import React from 'react';

function convertedSize(docSize) {
    return Number.parseFloat(docSize * 0.000000953674316).toPrecision(2);
}

const dateFormat = {
    dateStyle : 'medium',
    timeStyle : 'short'
}

export default function Card({document}) {
    const createdAt = new Date(document.createdAt)
    return <>
        <div className="card-file-thumb">
            <i className="fa fa-file-pdf-o"/>
        </div>
        <div className="card-body">
            <h6>
                {document.name}
            </h6>
            <span>{convertedSize(document.docSize)}Mo</span>
        </div>
        <div className="card-footer">Le {createdAt.toLocaleString()} par {document.user.username}
        </div>
    </>
}