import './styles/main.scss';
import './styles/theme.scss';
import type { optionTypes } from '../timepicker/utils/types';
export default class TimepickerUI {
    _degreesHours: number | null;
    _degreesMinutes: number | null;
    _options: optionTypes;
    private eventsClickMobile;
    private eventsClickMobileHandler;
    private mutliEventsMove;
    private mutliEventsMoveHandler;
    private _clickTouchEvents;
    private _element;
    private _isMobileView;
    private _isTouchMouseMove;
    isMinutesClick: boolean;
    constructor(element: HTMLDivElement, options?: optionTypes);
    private get modalTemplate();
    private get modalElement();
    private get clockFace();
    private get input();
    private get clockHand();
    private get circle();
    private get tipsWrapper();
    private get tipsWrapperFor24h();
    private get minutes();
    private get hour();
    private get AM();
    private get PM();
    private get minutesTips();
    private get hourTips();
    private get allValueTips();
    private get openElementData();
    private get openElement();
    private get cancelButton();
    private get okButton();
    private get activeTypeMode();
    private get keyboardClockIcon();
    private get footer();
    create: () => void;
    open: () => void;
    close: () => void;
    destroy: () => void;
    private removeCircleClockClasses24h;
    private setCircleClockClasses24h;
    private setErrorHandler;
    private removeErrorHandler;
    private _setOnStartCSSClassesIfClockType24h;
    private _setTheme;
    private _setInputClassToInputElement;
    private _setDataOpenToInputIfDosentExistInWrapper;
    private _setClassTopOpenElement;
    private _removeBackdrop;
    private _setNormalizeClass;
    private _setFlexEndToFooterIfNoKeyboardIcon;
    private _eventsBundle;
    private _handleOpenOnClick;
    private _getInputValueOnOpenAndSet;
    private _handleCancelButton;
    private _handleOkButton;
    private _handleBackdropClick;
    private _setBgColorToCirleWithHourTips;
    private _setBgColorToCircleWithMinutesTips;
    private _removeBgColorToCirleWithMinutesTips;
    private _setTimepickerClassToElement;
    private _setClassActiveToHourOnOpen;
    private _setMinutesToClock;
    private _setHoursToClock;
    private _setTransformToCircleWithSwitchesHour;
    private _setTransformToCircleWithSwitchesMinutes;
    private _handleAmClick;
    private _handlePmClick;
    private _handleAnimationClock;
    private _handleAnimationSwitchTipsMode;
    private _handleHourClick;
    private _handleMinutesClick;
    private _handleEventToMoveHand;
    private _toggleClassActiveToValueTips;
    private _handleMoveHand;
    private _setModalTemplate;
    private _setScrollbarOrNot;
    private _setAnimationToOpen;
    private _removeAnimationToClose;
    private _handleValueAndCheck;
    private handlerViewChange;
    private _handleIconChangeView;
    private _handlerClickHourMinutes;
    private _handleClickOnHourMobile;
}
