import classNames from 'classnames';
import { Link } from 'react-router-dom';

function Button({
    to,
    href,
    className, 
    outline = false,
    outlineNone = true,
    rounded = true,
    cyan = false,
    primary = false,
    danger = false,
    warning = false,
    onClick,
    children,
    ...passProp
}) {
    let props = {
        onClick,
        ...passProp,
    };

    let Comp = 'button';

    if (to) {
        props.to = to;
        Comp = Link;
    } else if (href) {
        props.href = href;
        Comp = 'a';
    }
    const defaultStyles = 'py-[7px] px-[12px] mx-3 text-black cursor-pointer ';
    const styles = classNames(defaultStyles,className, {
        'outline outline-1 outline-offset-0 text-black': outline,
        'text-black': outlineNone,
        'border-primary hover:bg-primary hover:text-[#fff]  border-2': primary,
        rounded,
        'bg-cyan hover:bg-cyan-hover  border-2': cyan,
        'border-danger hover:bg-h-danger hover:text-[#fff]  border-2': danger,
        'rounded-md': rounded, 
    });
    return (
        <Comp className={styles} {...props}> 
            {children}
        </Comp>
    );
}

export default Button;
