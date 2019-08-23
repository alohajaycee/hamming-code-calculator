function calculate(input) {

    let parity_count = parityCount(input);
    let bit_count    = input.length;
    let code_count   = parity_count + bit_count;

    let ufo_y        = new Array();
    ufo_y[0]         = 1;

    let ufo_q        = 1;
    let ufo_z        = 0;

    let parsed       = "";

    for (let i = 1; (ufo_q * 2) <= bit_count; i++)
    {
        ufo_q     *= 2;
        ufo_y[i]   = ufo_q;
    }

    for (let i = 1; i <= code_count; i++)
    { 
        if (ufo_y.includes(i))
        {
            parsed += "x";
        }
        else
        {
            parsed += input[ufo_z];

            ufo_z++;
        }
    }

    let ufo_p = new Array();

    for (let i = 0; i < ufo_y.length ; i++)
    { 
        let w = ufo_y[i] - 1;
        let x = ufo_y[i] + w;

        while (w < parsed.length)
        {
            while(w < x)
            {
                console.log(ufo_p)
                if (w < parsed.length) {
                    ufo_p[i] += parsed[w];
                }
                
                w++;
            }
                w = w + ufo_y[i];
                x = w + ufo_y[i];
        }
    }

    // console.log(ufo_p);
}

function parityCount(input) {

    let parity_hop =0;

    let skipper = 1;
    
    for (let i = 2; (skipper * 2) <= input.length; i++)
    {
        skipper   *= 2;
        parity_hop = i;
    }

    return parity_hop;
}